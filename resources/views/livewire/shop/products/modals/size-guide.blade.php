<div>
    @foreach($product->categories->whereNull('parent_id') as $category)
        @foreach(json_decode($category->size_guide) as $table)
            <img src="{{ Vite::asset('resources/images/size-guide-tables/'. $table) }}">
        @endforeach
    @endforeach
</div>
