<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\Device;
use App\Models\Customer;
use App\Models\Product;
use App\Models\LoanSell;
use App\Models\CashSell;
use App\Models\ProductStock;
use Illuminate\Support\Facades\DB;
class SellForm extends Component
{
    public $table = 'loan';
    public $formKey = 0;

    /* ================= LOAN ================= */

    public $loan_profit = [];
public $loan_discount = [];
public $cash_profit = 0;
    public $devices;
    public $loan_customer_name;
    public $loan_phone;
    public $loan_models = [];
    public $loan_quantities = [];
    public $loan_purchase_prices = [];
    public $loan_sale_prices = [];
    public $loan_number;
    public $loan_date;

    /* ================= CASH ================= */

    public $customers;
    public $cash_customer_id;
    public $cash_barcode;
    public $cash_model;
    public $cash_buy_price = '';
    public $cash_sell_price = '';
    public $cash_discount = '';
    public $cash_final_price = '';
    public $cash_number;
public $cash_items = [];
    public function mount()
    {
        $this->customers = Customer::all();
        $this->devices   = Device::all();
if ($this->table === 'loan') {
    $this->devices = ProductStock::all();
}
        $this->loan_models = [''];
        $this->loan_quantities = [1];
        $this->loan_purchase_prices = [''];
        $this->loan_sale_prices = [''];

        $this->loan_date = $this->todayJalali();
        $this->loan_number = $this->generateInvoiceNumber('L');
$this->cash_number = $this->generateInvoiceNumber('C');
$this->cash_items = [
    ['barcode'=>'', 'model'=>'', 'buy_price'=>'', 'sell_price'=>'', 'quantity'=>1, 'discount'=>'', 'final_price'=>'', 'profit'=>0],
];

    }
public function addCashItem()
{
    $this->cash_items[] = ['barcode'=>'', 'model'=>'', 'buy_price'=>'', 'sell_price'=>'', 'quantity'=>1, 'discount'=>'', 'final_price'=>'', 'profit'=>0];
}

public function removeCashItem($index)
{
    unset($this->cash_items[$index]);
    $this->cash_items = array_values($this->cash_items); // مرتب سازی اندکس‌ها
}
public function updatedCashItems($value, $name)
{
    // $name مثل: "0.barcode" یا "1.sell_price" ...
    [$index, $field] = explode('.', $name);

    // اگر بارکد تغییر کرد
    if ($field === 'barcode') {
        $barcode = trim($this->convertToEnglish($this->cash_items[$index]['barcode'] ?? ''));

        if (!$barcode) return;

        $product = Device::where('barcode', $barcode)->first();

        if ($product) {
            $this->cash_items[$index]['model'] = $product->name;
            $this->cash_items[$index]['buy_price'] = $product->buy_price;
            $this->cash_items[$index]['quantity'] = $this->normalizeQuantity($this->cash_items[$index]['quantity'] ?? 1);

            // پیشفرض قیمت فروش از دیتابیس، اما کاربر میتواند دستی تغییر دهد
            if (empty($this->cash_items[$index]['sell_price'])) {
                $this->cash_items[$index]['sell_price'] = $product->sell_price_retail;
            }

            $this->recalcCashRow($index);
        } else {
            $this->cash_items[$index] = ['barcode'=>$barcode, 'model'=>'', 'buy_price'=>'', 'sell_price'=>'', 'quantity'=>1, 'discount'=>'', 'final_price'=>'', 'profit'=>0];
            session()->flash('error', 'دستگاه یافت نشد ❌');
        }
    }

    if (in_array($field, ['barcode', 'quantity'])) {
        $barcode = trim($this->convertToEnglish($this->cash_items[$index]['barcode'] ?? ''));
        if ($barcode) {
            $product = Device::where('barcode', $barcode)->first();
            if ($product) {
                $available = (int) ($product->quantity ?? 0);
                $requested = $this->normalizeQuantity($this->cash_items[$index]['quantity'] ?? 1);
                if ($requested > $available) {
                    $this->cash_items[$index]['quantity'] = max($available, 1);
                    session()->flash('error', "موجودی کافی نیست. موجودی فعلی: {$available}");
                }
            }
        }
    }

    // اگر قیمت فروش یا تخفیف یا تعداد تغییر کرد
    if (in_array($field, ['sell_price','discount','quantity'])) {
        $this->recalcCashRow($index);
    }
}

private function recalcCashRow($index)
{
    $buy = (float) $this->convertToEnglish($this->cash_items[$index]['buy_price'] ?? 0);
    $sell = (float) $this->convertToEnglish($this->cash_items[$index]['sell_price'] ?? 0);
    $quantity = $this->normalizeQuantity($this->cash_items[$index]['quantity'] ?? 1);
    $this->cash_items[$index]['quantity'] = $quantity;

    $discountInput = $this->convertToEnglish($this->cash_items[$index]['discount'] ?? '');
    $discountValue = 0;

    if (str_contains($discountInput, '%')) {
        $percent = (float) str_replace('%','', $discountInput);
        if ($percent > 100) $percent = 100;
        $discountValue = ($sell * $percent) / 100;
    } else {
        $discountValue = (float) $discountInput;
        if ($discountValue > $sell) $discountValue = $sell;
    }

    $final = max($sell - $discountValue, 0);

    $this->cash_items[$index]['final_price'] = $final * $quantity;
    $this->cash_items[$index]['profit'] = ($final - $buy) * $quantity;

    // مجموع فاکتور (اگر خواستی مثل قبل هم داشته باشی)
    $this->cash_final_price = collect($this->cash_items)->sum(fn($r) => (float)($r['final_price'] ?? 0));
}
public function updatedLoanSalePrices($value, $key)
{
    $buy = (float) $this->convertToEnglish($this->loan_purchase_prices[$key] ?? 0);
    $sell = (float) $this->convertToEnglish($value);
    $discount = (float) $this->convertToEnglish($this->loan_discount[$key] ?? 0);

    $finalSell = $sell - $discount;

    $this->loan_profit[$key] = $finalSell - $buy;
}
public function updatedLoanDiscount($value, $key)
{
    $this->updatedLoanSalePrices($this->loan_sale_prices[$key] ?? 0, $key);
}
public function updatedLoanQuantities($value, $key)
{
    $quantity = $this->normalizeQuantity($value);
    $this->loan_quantities[$key] = $quantity;

    $modelId = $this->loan_models[$key] ?? null;
    if (!$modelId) {
        return;
    }

    $device = ProductStock::find($modelId);
    if ($device && $quantity > (int) ($device->stock ?? 0)) {
        $this->loan_quantities[$key] = max((int) $device->stock, 1);
        session()->flash('error', "موجودی کافی نیست. موجودی فعلی: {$device->stock}");
    }
}
public function updatedCashSellPrice($value)
{
    $buy = (float) $this->convertToEnglish($this->cash_buy_price);
    $sell = (float) $this->convertToEnglish($value);

    $this->cash_profit = $sell - $buy;

    $this->calculateFinal();
}
    /* ================= ابزار کمکی ================= */

    private function todayJalali()
    {
        return date('Y-m-d');
    }
    private function generateInvoiceNumber($prefix = 'INV')
{
    return $prefix . '-' . now()->format('YmdHis') . '-' . rand(100,999);
}

    private function convertToEnglish($number)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','٪'];
        $english = ['0','1','2','3','4','5','6','7','8','9','%'];

        return str_replace($persian, $english, $number);
    }

    /* ================= SWITCH ================= */

    public function showLoan() { $this->table = 'loan';$this->devices = ProductStock::all(); }
    public function showCash() { $this->table = 'cash';
    $this->devices = Device::all();
    $this->cash_barcode = '';
    $this->cash_model = '';
    $this->cash_buy_price = '';
    $this->cash_sell_price = '';
    $this->cash_discount = '';
    $this->cash_final_price = '';
    $this->cash_profit = 0;
    }

    /* ================= LOAN ================= */

    protected function rules()
{
    if ($this->table == 'loan') {
        return [
            'loan_customer_name' => 'required|string',
            'loan_phone' => 'required',
            'loan_models.*' => 'required',
            'loan_quantities.*' => 'nullable|integer|min:1',
            'loan_number' => 'required',
        ];
    }

    if ($this->table == 'cash') {
    return [
        'cash_customer_id' => 'required',
        'cash_number'      => 'required',

        // ✅ جدید برای چند دستگاه
        'cash_items'             => 'required|array|min:1',
        'cash_items.*.barcode'   => 'required',
        'cash_items.*.quantity'  => 'nullable|integer|min:1',
    ];
}

    return [];
}

protected $messages = [

    // فروش پرچون
    'loan_customer_name.required' => 'لطفاً نام مشتری را وارد کنید',
    'loan_phone.required' => 'شماره تماس مشتری را وارد کنید',
    'loan_models.*.required' => 'لطفاً دستگاه را انتخاب کنید',
    'loan_quantities.*.integer' => 'تعداد باید عدد باشد',
    'loan_quantities.*.min' => 'تعداد باید حداقل ۱ باشد',
    'loan_number.required' => 'شماره فاکتور را وارد کنید',

    // فروش عمده
    'cash_customer_id.required' => 'لطفاً مشتری را انتخاب کنید',
    'cash_barcode.required' => 'بارکد دستگاه را وارد کنید',
    'cash_number.required' => 'شماره فاکتور را وارد کنید',
'cash_items.required' => 'حداقل یک دستگاه اضافه کنید',
'cash_items.*.barcode.required' => 'بارکد دستگاه را وارد کنید',
'cash_items.*.quantity.integer' => 'تعداد باید عدد باشد',
'cash_items.*.quantity.min' => 'تعداد باید حداقل ۱ باشد',
];

    public function updatedLoanModels($value, $key)
{
    // ✅ اگر پرچون است از دوکان بخوان
    if ($this->table === 'loan') {
        $device = ProductStock::find($value);

        if ($device) {
            $this->loan_purchase_prices[$key] = $device->buy_price;
            $this->loan_sale_prices[$key]     = $device->sell_price ?? $device->sell_price_retail ?? '';
            $this->loan_quantities[$key]      = $this->normalizeQuantity($this->loan_quantities[$key] ?? 1);
        } else {
            $this->loan_purchase_prices[$key] = '';
            $this->loan_sale_prices[$key]     = '';
        }

        return;
    }

    // (کد قبلی‌ات اگر لازم شد برای حالت‌های دیگر)
    $device = Device::find($value);

    if ($device) {
        $this->loan_purchase_prices[$key] = $device->buy_price;
        $this->loan_sale_prices[$key]     = $device->sell_price;
    } else {
        $this->loan_purchase_prices[$key] = '';
        $this->loan_sale_prices[$key]     = '';
    }
}

    public function addLoanModel()
    {
        $this->loan_models[] = '';
        $this->loan_quantities[] = 1;
        $this->loan_purchase_prices[] = '';
        $this->loan_sale_prices[] = '';
    }

    public function removeLoanModel($index)
    {
        unset($this->loan_models[$index]);
        unset($this->loan_quantities[$index]);
        unset($this->loan_purchase_prices[$index]);
        unset($this->loan_sale_prices[$index]);
        $this->loan_models = array_values($this->loan_models);
        $this->loan_quantities = array_values($this->loan_quantities);
        $this->loan_purchase_prices = array_values($this->loan_purchase_prices);
        $this->loan_sale_prices = array_values($this->loan_sale_prices);
    }

    private function normalizeQuantity($value): int
    {
        $quantity = (int) $this->convertToEnglish((string) ($value ?? 1));
        return $quantity > 0 ? $quantity : 1;
    }

    private function normalizeQuantityInputs(): void
    {
        if (is_array($this->loan_quantities)) {
            foreach ($this->loan_quantities as $i => $value) {
                $this->loan_quantities[$i] = $this->normalizeQuantity($value);
            }
        }

        if (is_array($this->cash_items)) {
            foreach ($this->cash_items as $i => $row) {
                $this->cash_items[$i]['quantity'] = $this->normalizeQuantity($row['quantity'] ?? 1);
            }
        }
    }

    /* ================= CASH ================= */

   public function updatedCashBarcode()
{
    $barcode = trim($this->convertToEnglish($this->cash_barcode));

    // اگر خالی باشد
    if (!$barcode) {
        session()->flash('error', 'بارکد اشتباه است ❌');
        return;
    }

   $product = Device::where('barcode', $barcode)->first();

    if ($product) {
        $this->cash_model      = $product->name;
        $this->cash_buy_price  = $product->buy_price;
        $this->cash_sell_price = $product->sell_price_retail;

        $this->calculateFinal();
    } else {

        // اگر بارکد پیدا نشد
        $this->cash_model = '';
        $this->cash_buy_price = '';
        $this->cash_sell_price = '';
        $this->cash_final_price = '';

        session()->flash('error', 'دستگاه یافت نشد ❌');
    }
}

    public function updatedCashDiscount()
    {
        $this->calculateFinal();
    }

    private function calculateFinal()
    {
        $sell = (float) $this->convertToEnglish($this->cash_sell_price);
        $discountInput = $this->convertToEnglish($this->cash_discount);

        if (!$sell) {
            $this->cash_final_price = '';
            return;
        }

        $discountValue = 0;

        // اگر درصد باشد
        if (str_contains($discountInput, '%')) {

            $percent = str_replace('%', '', $discountInput);
            $percent = (float) $percent;

            if ($percent > 100) $percent = 100;

            $discountValue = ($sell * $percent) / 100;

        } else {

            $discountValue = (float) $discountInput;

            if ($discountValue > $sell) {
                $discountValue = $sell;
            }
        }

        $this->cash_final_price = $sell - $discountValue;
    }

    private function resolveCashDiscountValue($sell, $discountInput): float
    {
        $discountInput = $this->convertToEnglish((string) $discountInput);

        if (str_contains($discountInput, '%')) {
            $percent = (float) str_replace('%', '', $discountInput);
            $percent = min($percent, 100);
            return ($sell * $percent) / 100;
        }

        $discountValue = (float) $discountInput;
        return min($discountValue, $sell);
    }

    /* ================= SAVE ================= */

    public function save($redirect = true)
    {
        $selectedTable = $this->table;

        $this->normalizeQuantityInputs();
        $this->validate();
       DB::beginTransaction();
       try {
       if ($this->table == 'loan') {

    foreach ($this->loan_models as $index => $modelId) {

        $device = ProductStock::find($modelId); // ✅ دوکان

        if ($device) {
            $quantity = $this->normalizeQuantity($this->loan_quantities[$index] ?? 1);
            $buyPrice = (float) ($device->buy_price ?? $this->convertToEnglish($this->loan_purchase_prices[$index] ?? 0));

            $enteredSell = (float) $this->convertToEnglish($this->loan_sale_prices[$index] ?? 0);
            $fallbackSell = (float) ($device->sell_price ?? $device->sell_price_retail ?? 0);
            $sellBeforeDiscount = $enteredSell > 0 ? $enteredSell : $fallbackSell;

            if ((int)($device->stock ?? 0) < $quantity) {
                DB::rollBack();
                session()->flash('error', "موجودی کافی نیست. موجودی فعلی: {$device->stock}");
                return;
            }

            $discountUnit = (float) $this->convertToEnglish($this->loan_discount[$index] ?? 0);
            $finalSellUnit = max($sellBeforeDiscount - $discountUnit, 0);
            $totalBuyPrice = $buyPrice * $quantity;
            $finalSellPrice = $finalSellUnit * $quantity;
            $discountTotal = $discountUnit * $quantity;
            $profitTotal = $finalSellPrice - $totalBuyPrice;

            LoanSell::create([
                'name'       => $this->loan_customer_name,
                'model'      => $device->model,
                'number'     => $this->convertToEnglish($this->loan_number),
                'quantity'   => $quantity,
                'buy_price'  => $totalBuyPrice,
                'sell_price' => $finalSellPrice,
                'discount_amount' => $discountTotal,
                'profit_total' => $profitTotal,
                'barcode'    => $device->barcode ?? null,
                'admin_id'   => auth()->id(),
            ]);

            $device->stock = (int) $device->stock - $quantity;
            $device->save();
        }
    }
}

        if ($this->table == 'cash') {

    $customer = Customer::find($this->cash_customer_id);

    // ✅ اگر حالت چند دستگاه فعال است (cash_items)
    if (is_array($this->cash_items) && count($this->cash_items) > 0) {

        foreach ($this->cash_items as $row) {
            if (empty($row['barcode'])) continue;

            $quantity = $this->normalizeQuantity($row['quantity'] ?? 1);
            $product = Device::where('barcode', $row['barcode'])->first();
            $available = (int)($product->quantity ?? 0);

            if (!$product || $available < $quantity) {
                DB::rollBack();
                session()->flash('error', "موجودی کافی نیست. موجودی فعلی: {$available}");
                return;
            }

            $sellPrice = (float) $this->convertToEnglish($row['sell_price'] ?? 0);
            $discountValue = $this->resolveCashDiscountValue($sellPrice, $row['discount'] ?? 0);
            $buyPrice = (float) $this->convertToEnglish($row['buy_price'] ?? 0);
            $finalSellUnit = max($sellPrice - $discountValue, 0);
            $profitTotal = ($finalSellUnit - $buyPrice) * $quantity;

            CashSell::create([
                'customer_id'       => $this->cash_customer_id,
                'model'             => $row['model'] ?? '',
                'number'            => $this->convertToEnglish($this->cash_number),
                'quantity'          => $quantity,
                'buy_price'         => $buyPrice * $quantity,
                'sell_price_retail' => $sellPrice * $quantity,
                'discount_amount'   => $discountValue * $quantity,
                'profit_total'      => $profitTotal,
                'barcode'           => $row['barcode'] ?? null,
                'id_card'           => $customer?->id_card,
                'address'           => $customer?->address,
                'admin_id'          => auth()->id(),
            ]);

            $product->quantity = $available - $quantity;
            $product->save();
        }

    } else {

        // ✅ کد خودت بدون حذف (فقط به عنوان fallback)
        CashSell::create([
            'customer_id'       => $this->cash_customer_id,
            'model'             => $this->cash_model,
            'number'            => $this->convertToEnglish($this->cash_number),
            'quantity'          => 1,
            'buy_price'         => $this->cash_buy_price,
            'sell_price_retail' => (float) $this->convertToEnglish($this->cash_sell_price),
            'discount_amount'   => $this->resolveCashDiscountValue(
                (float) $this->convertToEnglish($this->cash_sell_price),
                $this->cash_discount
            ),
            'profit_total'      => ((float) $this->convertToEnglish($this->cash_final_price) - (float) $this->convertToEnglish($this->cash_buy_price)),
            'barcode'           => $this->cash_barcode,
            'id_card'           => $customer?->id_card,
            'address'           => $customer?->address,
            'admin_id'          => auth()->id(),
        ]);
    }
}

        DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        session()->flash('success', 'فروش موفقانه ثبت شد ✔');
        $this->resetFields();

        if ($redirect) {
            return redirect()->route('sell', ['tab' => $selectedTable]);
        }
    }

    public function saveAndPrint()
    {
        $this->save(false);
        $this->dispatch('print-page');
    }

    public function resetFields()
    {
        $this->loan_customer_name = '';
        $this->loan_phone = '';
        $this->loan_models = [''];
        $this->loan_quantities = [1];
        $this->loan_purchase_prices = [''];
        $this->loan_sale_prices = [''];
        $this->loan_number = '';

        $this->cash_customer_id = '';
        $this->cash_barcode = '';
        $this->cash_model = '';
        $this->cash_buy_price = '';
        $this->cash_sell_price = '';
        $this->cash_discount = '';
        $this->cash_final_price = '';
        $this->cash_number = '';
$this->loan_number = $this->generateInvoiceNumber('L');
$this->cash_number = $this->generateInvoiceNumber('C');
        $this->loan_date = $this->todayJalali();
$this->cash_items = [
    ['barcode'=>'', 'model'=>'', 'buy_price'=>'', 'sell_price'=>'', 'quantity'=>1, 'discount'=>'', 'final_price'=>'', 'profit'=>0],
];
        $this->formKey++;
    }

    public function render()
    {
        return view('livewire.mobile.sellform');
    }
}
