<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Inventory2 extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'tailwind';

    public $product_id;
    public $barcode, $name, $category, $status, $company;
    public $buy_price, $sell_price_retail, $sell_price_wholesale;
    public $total_buy, $paid_amount, $quantity;
    public $profit_each, $profit_total;
    public $image;
    public $search = '';
    public $categoryFilter = '';

    protected $rules = [
        'name' => 'required|string',
        'buy_price' => 'required|numeric',
        'sell_price_retail' => 'required|numeric',
        'quantity' => 'required|integer',
        'image' => 'nullable|image|max:10240'
    ];

    private function normalizeNumber($value)
    {
        if ($value === null) return null;

        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];

        $value = str_replace($persian, $english, $value);
        $value = str_replace($arabic,  $english, $value);

        return $value;
    }

    public function updated($field)
    {
        if (in_array($field, ['buy_price', 'sell_price_retail', 'sell_price_wholesale', 'quantity', 'total_buy', 'paid_amount'])) {
            $this->$field = $this->normalizeNumber($this->$field);
        }

        if (in_array($field, ['buy_price', 'sell_price_retail', 'quantity'])) {
            $this->profit_each  = (float)$this->sell_price_retail - (float)$this->buy_price;
            $this->profit_total = $this->profit_each * (int)$this->quantity;
        }
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        // 🔹 اگر بارکد وارد نشده، فقط در دوکان بساز (گدام تغییر نکند)
        if (!$this->barcode) {
            $this->barcode = 'IMEI-' . Str::random(8);
        }

        // 🔹 اگر بارکد در گدام موجود بود، موجودی گدام کم شود
        $warehouseProduct = Product::where('barcode', $this->barcode)->lockForUpdate()->first();
        if ($warehouseProduct && $warehouseProduct->quantity >= $this->quantity) {
            $warehouseProduct->decrement('quantity', $this->quantity);
        } elseif ($warehouseProduct && $warehouseProduct->quantity < $this->quantity) {
            $this->addError('quantity', '❌ موجودی گدام کافی نیست');
            return;
        }

        // 🔹 ثبت یا بروزرسانی فقط در دوکان
        Product::updateOrCreate(
            ['id' => $this->product_id],
            [
                'barcode' => $this->barcode,
                'name' => $this->name,
                'category' => $this->category,
                'status' => $this->status,
                'company' => $this->company,
                'buy_price' => $this->buy_price,
                'sell_price_retail' => $this->sell_price_retail,
                'sell_price_wholesale' => $this->sell_price_wholesale,
                'total_buy' => $this->total_buy,
                'paid_amount' => $this->paid_amount,
                'quantity' => $this->quantity,
                'image' => $imagePath,
                'user_id'  => Auth::id(),
                'admin_id' => Auth::id(),
            ]
        );

        $this->resetForm();
        session()->flash('success', '✅ محصول با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->product_id = $product->id;
        $this->barcode = $product->barcode;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->status = $product->status;
        $this->company = $product->company;
        $this->buy_price = $product->buy_price;
        $this->sell_price_retail = $product->sell_price_retail;
        $this->sell_price_wholesale = $product->sell_price_wholesale;
        $this->total_buy = $product->total_buy;
        $this->paid_amount = $product->paid_amount;
        $this->quantity = $product->quantity;
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->reset([
            'product_id','barcode','name','category','status','company',
            'buy_price','sell_price_retail','sell_price_wholesale',
            'total_buy','paid_amount','quantity',
           'image'
        ]);
    }

    public function render()
    {
        $products = Product::where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('barcode', 'like', '%'.$this->search.'%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category', 'like', '%' . $this->categoryFilter . '%');
            })
            ->oldest()
            ->paginate(5);

        return view('livewire.mobile.inventory2', compact('products'));
    }
}
