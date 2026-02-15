<div class="bg-white rounded-2xl shadow p-6">

    <h1 class="text-xl font-bold text-center mb-6">فروشات</h1>

    {{-- پیام موفقیت --}}
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-xl mb-4 text-center success-message">
            {{ session('success') }}
        </div>
    @endif
@if (session()->has('error'))
    <div class="alert alert-danger bg-red-100 text-red-800 p-3 rounded-xl mb-4 text-center">
        {{ session('error') }}
    </div>
@endif
    {{-- انتخاب نوع فروش --}}
    <div class="flex gap-2 mb-4">
        <button type="button" wire:click="showLoan"
            class="flex-1 py-2 rounded-lg text-white {{ $table=='loan'?'bg-blue-700':'bg-blue-500' }}">
            فروش پرچون
        </button>

        <button type="button" wire:click="showCash"
            class="flex-1 py-2 rounded-lg text-white {{ $table=='cash'?'bg-blue-700':'bg-blue-500' }}">
            فروش عمده
        </button>
    </div>

    {{-- کل فرم داخل key برای ریست کامل --}}
    <div wire:key="form-{{ $formKey }}">

    <form wire:submit.prevent="save">

    {{-- ======================= فروش پرچون ======================= --}}
    @if($table == 'loan')

        <input wire:model="loan_customer_name"
            class="w-full border rounded-xl px-4 py-2 mb-2"
            placeholder="نام مشتری">
@error('loan_customer_name')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
        <input wire:model="loan_phone"
            class="w-full border rounded-xl px-4 py-2 mb-3"
            placeholder="شماره تماس">
@error('loan_phone')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
        @foreach($loan_models as $index => $model)

            <div class="border rounded-xl p-3 mb-2 bg-gray-50">

                <select wire:model.live="loan_models.{{ $index }}"
                    class="w-full border rounded-xl px-4 py-2 mb-2">

                    <option value="">انتخاب دستگاه</option>
                    @foreach($devices as $device)
                        <option value="{{ $device->id }}">
                            {{ $device->model }}
                        </option>
                    @endforeach
                </select>
                @error('loan_models')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
                {{-- قیمت خرید --}}
                <input readonly
                    class="w-full border rounded-xl px-4 py-2 mb-2 bg-gray-100"
                    value="{{ $loan_purchase_prices[$index] ?? '' }}  افغانی  قیمت خرید "
                    placeholder="قیمت خرید">

                {{-- قیمت فروش --}}
                <input readonly
                    class="w-full border rounded-xl px-4 py-2 mb-2 bg-gray-100"
                    value="{{ $loan_sale_prices[$index] ?? '' }}  افغانی  قیمت فروش"
                    placeholder= "افغانی قیمت فروش">

                @if(count($loan_models) > 1)
                    <button type="button"
                        wire:click="removeLoanModel({{ $index }})"
                        class="text-red-600 text-sm">
                        حذف
                    </button>
                @endif

            </div>

        @endforeach

        <button type="button"
            wire:click="addLoanModel"
            class="text-blue-600 text-sm mb-3">
            + افزودن دستگاه
        </button>

        <input wire:model="loan_number"
            class="w-full border rounded-xl px-4 py-2 mb-3"
            placeholder="شماره فاکتور">
    @error('loan_number')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
    @endif


    {{-- ======================= فروش عمده ======================= --}}
    @if($table == 'cash')

        {{-- انتخاب مشتری --}}
        <select wire:model="cash_customer_id"
            class="w-full border rounded-xl px-4 py-2 mb-3">
            <option value="">انتخاب مشتری</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->fullname }}
                </option>
            @endforeach
        </select>
 @error('cash_customer_id')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
        {{-- بارکد --}}
        <input wire:model.live="cash_barcode"
            class="w-full border rounded-xl px-4 py-2 mb-2"
            placeholder="بارکد دستگاه">
@error('cash_barcode')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
        {{-- نام دستگاه --}}
        <input readonly
            class="w-full border rounded-xl px-4 py-2 mb-2 bg-gray-100"
            value="{{ $cash_model }} نام دستگاه"
            placeholder="نام دستگاه">

        {{-- قیمت خرید --}}
        <input readonly
            class="w-full border rounded-xl px-4 py-2 mb-2 bg-gray-100"
            value="{{ $cash_buy_price }}افغانی قیمت خرید"
            placeholder= " افغانی قیمت خرید">

        {{-- قیمت فروش --}}
        <input readonly
            class="w-full border rounded-xl px-4 py-2 mb-2 bg-gray-100"
            value="{{ $cash_sell_price }} افغانی قیمت فروش "
            placeholder=" افغانی قیمت فروش">

        {{-- تخفیف --}}
        <input wire:model.live="cash_discount"
            class="w-full border rounded-xl px-4 py-2 mb-2"
            placeholder="تخفیف (اختیاری)">

        {{-- مبلغ نهایی --}}
        <input readonly
            class="w-full border rounded-xl px-4 py-2 mb-3 bg-green-100 font-bold"
            value="{{ $cash_final_price }}افغانی مبلغ کل "
            placeholder="مبلغ کل">

        <input wire:model="cash_number"
            class="w-full border rounded-xl px-4 py-2 mb-3"
            placeholder="شماره فاکتور">
@error('cash_number')
    <span class="text-red-600 text-xs">{{ $message }}</span>
@enderror
    @endif


    {{-- ======================= دکمه‌ها ======================= --}}
    <div class="flex gap-3 mt-4">

        <button type="submit"
            class="flex-1 bg-blue-600 text-white py-2 rounded-xl">
            ثبت
        </button>

        <button type="button"
            wire:click="saveAndPrint"
            class="flex-1 bg-green-600 text-white py-2 rounded-xl">
            ثبت و چاپ
        </button>

        <button type="button"
            wire:click="resetFields"
            class="flex-1 bg-red-600 text-white py-2 rounded-xl">
            لغو
        </button>

    </div>

    </form>
    </div>

</div>


{{-- حذف پیام موفقیت بعد از ۳ ثانیه --}}
<script>
setTimeout(function(){
    document.querySelectorAll('.success-message')
        .forEach(el => el.remove());
},3000);
</script>

{{-- چاپ --}}
<script>
document.addEventListener('livewire:init', () => {
    Livewire.on('print-page', () => {
        window.print();
    });
});
</script>
