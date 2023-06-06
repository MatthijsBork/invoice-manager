


<x-form-field field-name="attention_to" label="{{ __('Attention to') }}" type="text" value="{{ $invoice->attention_to ?? '' }}" placeholder="Mr. laravel"></x-form-field>
    <x-form-field field-name="description" label="{{ __('Description') }}" type="text" placeholder="Please write a description of the service" value="{{ $invoice->description ?? '' }}"></x-form-field>
        <x-form-field field-name="invoice_date" label="{{ __('Invoice date') }}" type="date" value="{{ isset($invoice) ? $invoice->invoice_date->format('Y-m-d') : '' }}"></x-form-field>
            <x-form-field field-name="expiration_date" label="{{ __('Expiration date') }}" type="date" value="{{ isset($invoice) ? $invoice->expiration_date->format('Y-m-d') : '' }}"></x-form-field>

                    <x-select-field field-name="debtor_id" label="Debtors" :options="$debtors"></x-select-field>
                    <x-select-field field-name="address_id" label="Address" selected="" :options="$addresses"></x-select-field>


                    <div class="py-4">
                        <x-label value="Invoice lines"></x-label>

                        @for($i = 0; $i < 4; $i++)


                        <div class="flex flex-row">
                            <div class="basis-2/3">
                                <x-form-field field-name="invoice_line_description[{{ $i }}]" label="{{ __('Description') }}" type="text" value="{{ $invoice->lines[$i]->description ?? '' }}"></x-form-field>
                            </div>

                            <div class="basis-1/6">
                                <x-form-field field-name="price[{{ $i }}]" label="{{ __('Price') }}" type="text" value="{{ $invoice->lines[$i]->price_exclusive ?? '' }}"></x-form-field>
                            </div>

                            <div class="basis-1/6">
                                <x-form-field field-name="VAT_percentage[{{ $i }}]" label="{{ __('VAT percentage') }}" type="text" value="{{ $invoice->lines[$i]->VAT_percentage ?? '' }}"></x-form-field>
                            </div>
                        </div>
                        @endfor
                    </div>











                    <x-button class="mt-3">
                        {{ __('Submit') }}

                    </x-button>
