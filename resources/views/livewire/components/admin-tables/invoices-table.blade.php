<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.invoices-search-bar/>
    <div class="p-4 bg-white rounded space-y-8 sm:p-8">
        @if ($invoices->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('invoice.index.table.title') }}</h3>
                <x-badge>{{$invoices->total()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-0 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                                class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                                <th class="whitespace-nowrap">{{ __('invoice.index.table.cols.invoice_code') }}</th>
                                <th class="whitespace-nowrap">{{ __('invoice.index.table.cols.invoice_date') }}</th>
                                <th class="whitespace-nowrap">{{ __('invoice.index.table.cols.user') }}</th>
                                <th class="whitespace-nowrap">{{ __('invoice.index.table.cols.amount') }}</th>
                                <th class="whitespace-nowrap">{{ __('invoice.index.table.cols.payment_status') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($invoices as $invoice)
                                <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td class="whitespace-nowrap">{{ $invoice->code }}</td>
                                    <td class="whitespace-nowrap">{{ $invoice->created_at->format('d/m/Y') }}</td>
                                    <td class="whitespace-nowrap">{{ $invoice->supply->reseller->fullname }}</td>
                                    <td class="whitespace-nowrap">@money($invoice->supply->amount)</td>
                                    <td class="whitespace-nowrap">
                                        <x-badge class="justify-center" color="{{ \App\Models\Invoice::STATUSES[$invoice->status] }}">
                                            {{ __('invoice.statuses.'.$invoice->status) }}
                                        </x-badge>
                                    </td>
                                    <td class="text-right">
                                        <a class="flex items-center justify-center ml-auto bg-color-ef4983 w-8 h-8 text-center text-white rounded-sm hover:bg-color-ef4983/90"
                                           href="{{ route('supply.purchases.invoice', ['supply' => $invoice->supply->id]) }}">
                                            <x-icons name="download" class="w-4 h-4"/>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $invoices->links() }}
        @else
            <div class="text-center text-sm text-color-6c757d">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
