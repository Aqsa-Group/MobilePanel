<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\Device;
use App\Models\Customer;
use App\Models\Product;
use App\Models\LoanSell;
use App\Models\CashSell;

class SellForm extends Component
{
    public $table = 'loan';
    public $formKey = 0;

    /* ================= LOAN ================= */

    public $devices;
    public $loan_customer_name;
    public $loan_phone;
    public $loan_models = [];
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

    public function mount()
    {
        $this->customers = Customer::all();
        $this->devices   = Product::orderBy('created_at','desc')->get(); // ✅ بجای Device

        $this->loan_models = [''];
        $this->loan_purchase_prices = [''];
        $this->loan_sale_prices = [''];

        $this->loan_date = $this->todayJalali();
    }

    /* ================= ابزار کمکی ================= */

    private function todayJalali()
    {
        return date('Y-m-d');
    }

    private function convertToEnglish($number)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','٪'];
        $english = ['0','1','2','3','4','5','6','7','8','9','%'];

        return str_replace($persian, $english, $number);
    }

    /* ================= SWITCH ================= */

    public function showLoan() { $this->table = 'loan'; }
    public function showCash() { $this->table = 'cash'; }

    /* ================= LOAN ================= */

    protected function rules()
{
    if ($this->table == 'loan') {
        return [
            'loan_customer_name' => 'required|string',
            'loan_phone' => 'required',
            'loan_models.*' => 'required',
            'loan_number' => 'required',
        ];
    }

    if ($this->table == 'cash') {
        return [
            'cash_customer_id' => 'required',
            'cash_barcode' => 'required',
            'cash_number' => 'required',
        ];
    }

    return [];
}

protected $messages = [

    // فروش پرچون
    'loan_customer_name.required' => 'لطفاً نام مشتری را وارد کنید',
    'loan_phone.required' => 'شماره تماس مشتری را وارد کنید',
    'loan_models.*.required' => 'لطفاً دستگاه را انتخاب کنید',
    'loan_number.required' => 'شماره فاکتور را وارد کنید',

    // فروش عمده
    'cash_customer_id.required' => 'لطفاً مشتری را انتخاب کنید',
    'cash_barcode.required' => 'بارکد دستگاه را وارد کنید',
    'cash_number.required' => 'شماره فاکتور را وارد کنید',

];

    public function updatedLoanModels($value, $key)
    {
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
        $this->loan_purchase_prices[] = '';
        $this->loan_sale_prices[] = '';
    }

    public function removeLoanModel($index)
    {
        unset($this->loan_models[$index]);
        unset($this->loan_purchase_prices[$index]);
        unset($this->loan_sale_prices[$index]);
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

    $product = Product::where('barcode', $barcode)->first();

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

    /* ================= SAVE ================= */

    public function save()
    {
        $this->validate();
        if ($this->table == 'loan') {

            foreach ($this->loan_models as $modelId) {

                $device = Device::find($modelId);

                if ($device) {
                    LoanSell::create([
                        'name'       => $this->loan_customer_name,
                        'model'      => $device->model,
                        'number'     => $this->convertToEnglish($this->loan_number),
                        'buy_price'  => $device->buy_price,
                        'sell_price' => $device->sell_price,
                        'barcode'    => $device->barcode ?? null,
                    ]);
                }
            }
        }

        if ($this->table == 'cash') {

            $customer = Customer::find($this->cash_customer_id);

            CashSell::create([
                'customer_id'       => $this->cash_customer_id,
                'model'             => $this->cash_model,
                'number'            => $this->convertToEnglish($this->cash_number),
                'buy_price'         => $this->cash_buy_price,
                'sell_price_retail' => $this->cash_sell_price,
                'profit_total'      => $this->cash_final_price, // 👈 مبلغ نهایی ذخیره شد
                'barcode'           => $this->cash_barcode,
                'id_card'           => $customer?->id_card,
                'address'           => $customer?->address,
            ]);
        }

        session()->flash('success', 'فروش موفقانه ثبت شد ✔');
        $this->resetFields();
    }

    public function saveAndPrint()
    {
        $this->save();
        $this->dispatch('print-page');
    }

    public function resetFields()
    {
        $this->loan_customer_name = '';
        $this->loan_phone = '';
        $this->loan_models = [''];
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

        $this->loan_date = $this->todayJalali();

        $this->formKey++;
    }

    public function render()
    {
        return view('livewire.mobile.sellform');
    }
}
