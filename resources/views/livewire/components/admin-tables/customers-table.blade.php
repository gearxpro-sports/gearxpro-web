<div class="relative">    
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.customers-search-bar />
    <div class="p-8 bg-white rounded">
        @if ($customers->count() > 0)
        <div class="flex items-center mb-8">
            <h3 class="text-black-1 font-medium">{{ __('customers.index.table.title') }}</h3>
            <span class="inline-block ml-4 py-1.5 px-4 bg-color-eff0f0 text-color-6c757d text-xs text-center font-medium rounded-full">{{ $customers->total() }}</span>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                    <th class="text-left">{{ __('customers.index.table.cols.name') }}</th>
                    <th class="text-left">{{ __('customers.index.table.cols.email') }}</th>
                    <th>{{ __('customers.index.table.cols.registration_date') }}</th>
                    <th>{{ __('customers.index.table.cols.last_order_date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                    <td>{{ $customer->firstname }} {{ $customer->lastname }}</td>
                    <td>{{ $customer->email }}</td>
                    <td class="text-center">{{ $customer->created_at->format('d M Y') }}</td>
                    <td class="text-center"></td>
                    <td class="text-right">
                        <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                            <x-heroicon-o-eye class="w-5 h-5"></x-heroicon-o-eye>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
