<div class="mx-28 print:mx-0">
    <div class="grid gap-1 first:pt-4 py-10 border-b-2 print:first:pt-0 print:py-0 print:border-b-0">
        <div class="text-center mb-4 print:hidden">
            <x-primary-button onclick="window.print()"
                              class="justify-center">{{ __('common.print') }}</x-primary-button>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-5">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class="w-44">
                <h3 class="text-sm">
                    <p>
                        {{ __('invoice.show.invoice_n') }} <span class="font-semibold">{{ $supply->invoice->code }}</span>
                        {{ __('invoice.show.of') }} <span class="font-semibold">{{ $supply->invoice->created_at->format('d/m/Y') }}</span>
                    </p>
                </h3>
            </div>
            <div class="space-y-2">
                <h3 class="text-sm">{{ __('invoice.show.customer') }}</h3>
                <div class="bg-gray-100 border border-gray-300 p-4 text-sm space-y-2">
                    <p>{{ $supply->reseller->fullname }}</p>
                    <p>{{ $supply->reseller->shipping_address->company }}</p>
                    <p>{{ $supply->reseller->shipping_address->address_1 }}
                        - {{ $supply->reseller->shipping_address->postcode }} {{ $supply->reseller->shipping_address->city }}
                        ({{ $supply->reseller->shipping_address->state }})</p>
                    <p>{{ $supply->reseller->shipping_address->phone }}</p>
                    @if($supply->reseller->billing_address->vat_number || $supply->reseller->billing_address->tax_code)
                        <div class="!mt-3">
                            <h3 class="underline font-semibold">{{ __('invoice.show.customer_tax_codes') }}</h3>
                            <p>{{ $supply->reseller->billing_address->vat_number ?? '-' }}</p>
                            <p>{{ $supply->reseller->billing_address->tax_code ?? '-' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="flex !border-x border-x-gray-400 !divide-x !divide-x-gray-400 h-9">
                <div class="w-52 print:w-32 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.sku') }}</span>
                </div>
                <div class="flex-1 print:w-96 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.description') }}</span>
                </div>
                <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.quantity') }}</span>
                </div>
                <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.unit_price') }}</span>
                </div>
{{--                <div class="w-24 print:w-24 relative border border-gray-400 py-2 text-xs !border-x-0">--}}
{{--                    <span class="text-[10px] absolute top-2 px-2 w-full">Sc.</span>--}}
{{--                </div>--}}
                <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.total') }}</span>
                </div>
                <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-x-0">
                    <span class="text-[10px] absolute top-2 px-2 w-full">{{ __('invoice.show.table.vat') }}</span>
                </div>
            </div>

            @foreach($supply->rows as $row)
                @php($variant = \App\Models\ProductVariant::where('id', $row->product->id)->withTrashed()->first())
                @if (!$variant)
                    @continue
                @endif
                <div class="flex !border-x border-x-gray-400 !divide-x !divide-x-gray-400 h-9">
                    <div class="w-52 print:w-32 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">
                            {{ $row->product->sku }}
                        </div>
                    </div>
                    <div class="flex-1 print:w-96 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">
                            <div class="flex space-x-1">
                                <span>{{ $variant->product->name }}</span>
                                <span class="text-color-b6b9bb">•</span>
                                <div class="flex divide-x text-xxs">
                                    @foreach($variant->terms as $term)
                                        <span class="first:pl-0 px-1">{{ $term->value }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">{{ $row->quantity }}</div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">@money($row->price)</div>
                    </div>
{{--                    <div class="w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">--}}
{{--                        <div class="mx-2 uppercase min-h-[18px] !mt-0">-</div>--}}
{{--                    </div>--}}
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">@money($row->price * $row->quantity)</div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">-</div>
                    </div>
                </div>
            @endforeach
            @foreach(range(1, 21 - $supply->rows->count()) as $n)
                <div class="flex !border-x border-x-gray-400 !divide-x !divide-x-gray-400 h-9">
                    <div class="w-52 print:w-32 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="flex-1 print:w-96 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
{{--                    <div class="w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">--}}
{{--                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>--}}
{{--                    </div>--}}
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative border border-gray-400 py-2 text-xs !border-t-0 !border-x-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                </div>
            @endforeach
            <div class="mt-4">
                <div class="flex h-9">
                    <div class="w-52 print:w-32 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="flex-1 print:w-96 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">{{ __('invoice.show.table.taxable') }}</div>
                    </div>
{{--                    <div class="w-24 relative py-2 text-xs">--}}
{{--                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>--}}
{{--                    </div>--}}
                    <div class="w-44 print:w-24 relative py-2 text-xs border border-gray-400">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">@money(0)</div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                </div>
                <div class="flex h-9">
                    <div class="w-52 print:w-32 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="flex-1 print:w-96 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">{{ __('invoice.show.table.vat_tax') }}</div>
                    </div>
{{--                    <div class="w-24 relative py-2 text-xs">--}}
{{--                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>--}}
{{--                    </div>--}}
                    <div class="w-44 print:w-24 relative py-2 text-xs border border-gray-400 border-t-0">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0">@money(0)</div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                </div>
                <div class="flex h-9">
                    <div class="w-52 print:w-32 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="flex-1 print:w-96 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0 font-bold">{{ __('invoice.show.table.invoice_amount') }}</div>
                    </div>
{{--                    <div class="w-24 relative py-2 text-xs">--}}
{{--                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>--}}
{{--                    </div>--}}
                    <div class="w-44 print:w-24 relative py-2 text-xs border border-gray-400 border-t-0 bg-gray-200">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0 font-bold">@money($supply->amount)</div>
                    </div>
                    <div class="w-44 print:w-24 relative py-2 text-xs">
                        <div class="mx-2 uppercase min-h-[18px] !mt-0"></div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="space-y-2">
                        <h3 class="text-sm">{{ __('invoice.show.payment_method') }}</h3>
                        <div class="bg-gray-100 border border-gray-300 p-4 text-sm">
                            {{ $supply->reseller->payment_method ? __('payment_methods.'.$supply->reseller->payment_method) : '-' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-break"></div>
</div>
