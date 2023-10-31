<ul>
    @foreach ($categories as $category)
        <li x-data="{open_{{ $category->id }} : $wire.productForm.categories.includes({{ $category->id }})}" :key="cat_{{ $category->id }}">
            <x-checkbox
                wire:loading.attr="disabled"
                wire:model.change="productForm.categories"
                class="my-1.5 text-base cursor-pointer [&+span]:font-bold [&+span]:cursor-pointer [&+span:hover]:text-color-18181a"
                label="{{ $category->name }}"
                value="{{ $category->id }}"
                name="cat[{{ $category->id  }}]"
                @change="open_{{ $category->id }} = !open_{{ $category->id }}"
                wire:change="updateCategories({{ $category->id }})"
            />
            @if ($category->children->count())
                <div id="subcategories_of_{{ $category->id }}" x-show="open_{{ $category->id }}" class="inline-block my-2 py-2 px-6 border border-color-dee2e6">
                    <x-category-tree :categories="$category->children" />
                </div>
            @endif
        </li>
    @endforeach
</ul>
