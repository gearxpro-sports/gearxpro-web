<div>
    @foreach(json_decode($product->size_guide) as $table)
        <img src="{{ Vite::asset('resources/images/size-guide-tables/'. $table) }}">
    @endforeach
</div>
