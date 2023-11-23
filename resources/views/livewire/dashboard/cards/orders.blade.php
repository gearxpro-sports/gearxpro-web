<div class="flex flex-col justify-between text-center bg-white p-4 h-[294px] space-y-3">
    <div class="flex items-center justify-between border-b pb-4">
        <h3 class="text-sm font-medium">{{ __('dashboard.cards.orders.title') }}</h3>
    </div>
    <div class="h-full">
        <x-chart
            type="line"
            :labels="$labels"
            :values="$values"
            :datasets="$datasets"
            :displayLabel="false"
        ></x-chart>
    </div>
    <div>
{{--        <x-primary-button href="{{ route('stocks.index') }}" class="!h-8">{{ __('dashboard.cards.orders.cta') }}</x-primary-button>--}}
    </div>
</div>
