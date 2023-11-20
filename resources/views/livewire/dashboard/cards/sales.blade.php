<div class="border flex flex-col justify-between text-center bg-white h-[294px] space-y-3">
    <div class="flex items-center justify-between border-b p-4">
        <h3 class="text-sm font-medium">{{ __('dashboard.cards.sales.title') }}</h3>
    </div>
    <div class="p-4 h-full">
        <x-chart
            type="bar"
            :labels="$labels"
            :values="$values"
            :datasets="$datasets"
        ></x-chart>
    </div>
</div>
