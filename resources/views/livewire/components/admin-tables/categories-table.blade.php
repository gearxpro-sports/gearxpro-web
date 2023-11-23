<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    <div class="grid grid-cols-1 gap-4 items-end mb-2.5 bg-white py-4 px-4 text-xs rounded shadow-shadow-1 md:grid-cols-2 md:px-7">
        <div>
            <div class="relative">
                <x-input wire:model.live.debounce.500ms="search" name="search" placeholder="{{ __('common.search') }}" class="h-10 py-0">
                    <x-slot:append>
                    <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm">
                        <x-icons name="search" class="w-4 h-4" />
                    </span>
                    </x-slot:append>
                </x-input>
            </div>
        </div>
    </div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($categories->count() > 0)
        <div class="flex items-center space-x-4">
            <h3 class="text-black-1 font-medium">{{ __('categories.index.table.title') }}</h3>
            <x-badge>{{$categories->total()}}</x-badge>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                    <th class="w-1 uppercase text-center">{{ __('categories.index.table.cols.id') }}</th>
                    <th class="w-1/5 text-left font-bold">{{ __('categories.index.table.cols.name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                    <td class="text-color-6c757d text-center">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-right">
                        <div class="flex items-center space-x-2 justify-end">
                            <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('categories.edit', ['category' => $category->id]) }}">
                                <x-icons name="edit" class="w-4 h-4" />
                            </a>
                            <button type="button" class="flex items-center justify-center bg-color-e54f33 text-white w-8 h-8 text-center rounded-sm" wire:click="deleteCategory({{ $category->id }})" wire:confirm="{{ __('categories.alert.delete_category') }}">
                                <x-icons name="trash" class="w-3 h-3" />
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
