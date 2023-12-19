<div class="flex flex-col justify-between text-center bg-white p-4 space-y-3 overflow-hidden">
    <div class="flex items-center justify-between border-b pb-4">
        <h3 class="text-sm font-medium">{{ __('dashboard.cards.bestsellers.title') }}</h3>
{{--        <x-secondary-button href="{{ route('stocks.index') }}" class="!h-8">{{ __('dashboard.cards.bestsellers.cta') }}</x-secondary-button>--}}
    </div>
    <div>
        <div class="-mx-0 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table
                    class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                    <thead>
                    <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.bestsellers.table.cols.position') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.bestsellers.table.cols.id') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.bestsellers.table.cols.image') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.bestsellers.table.cols.name') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.bestsellers.table.cols.price') }}</th>
{{--                        <th></th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                            {{-- TODO: Inserire numero classifica veritiero --}}
                            <td class="whitespace-nowrap">#{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="whitespace-nowrap">{{ $item->id }}</td>
                            <td class="whitespace-nowrap">
                                <div class="w-10 h-10 mx-auto">
                                    <img src="{{ $item->product->defaultImages->thumb }}" alt="{{ $item->product->name }}">
                                </div>
                            </td>
                            <td class="whitespace-nowrap">{{ $item->product->name }}</td>
                            <td class="whitespace-nowrap">@money($item->product->price)</td>
{{--                            <td class="text-right">--}}
{{--                                <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm"--}}
{{--                                   href="{{ route('shop.show', ['product' => $item->product->slug, 'country_code' => session('country_code')]) }}">--}}
{{--                                    <x-icons name="eye" class="w-4 h-4"/>--}}
{{--                                </a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
