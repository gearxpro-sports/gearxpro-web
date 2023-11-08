<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.customers-search-bar/>
    <div class="p-4 bg-white rounded space-y-8 sm:p-8">
        @if ($customers->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('customers.index.table.title') }}</h3>
                <x-badge>{{$customers->total()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-0 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium @role(App\Models\User::SUPERADMIN) [&>th]:w-1/6 @else [&>th]:w-1/5 @endrole border-b-color-eff0f0">
                                <th class="whitespace-nowrap">{{ __('customers.index.table.cols.name') }}</th>
                                <th class="whitespace-nowrap">{{ __('customers.index.table.cols.email') }}</th>
                                @role(App\Models\User::SUPERADMIN)
                                <th class="whitespace-nowrap">{{ __('customers.index.table.cols.reseller') }}</th>
                                @endrole
                                <th class="whitespace-nowrap">{{ __('customers.index.table.cols.registration_date') }}</th>
                                <th class="whitespace-nowrap">{{ __('customers.index.table.cols.last_order_date') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td class="whitespace-nowrap">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                                    <td class="whitespace-nowrap">{{ $customer->email }}</td>
                                    @role(App\Models\User::SUPERADMIN)
                                    <td class="whitespace-nowrap">
                                        @if ($customer->country->reseller)
                                        <a target="_blank" class="inline-block hover:underline" href="{{ route('resellers.show', ['reseller' => $customer->country->reseller->id]) }}}">
                                            <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($customer->country->iso2_code) }}.png" alt="{{ $customer->country->name }}">
                                            {{ $customer->country->reseller->fullname }}
                                        </a>
                                        @endif
                                    </td>
                                    @endrole
                                    <td class="whitespace-nowrap">{{ $customer->created_at->format('d/m/Y') }}</td>
                                    <td class="whitespace-nowrap">-</td>
                                    <td class="text-right">
                                        <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm"
                                           href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                                            <x-icons name="eye" class="w-4 h-4"/>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $customers->links() }}
        @else
            <div class="text-center text-sm text-color-6c757d">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
