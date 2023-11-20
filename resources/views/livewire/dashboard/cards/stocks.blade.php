<div class="flex flex-col justify-between text-center bg-white p-4 h-[294px]">
    <h3 class="text-sm font-medium text-center border-b pb-4">{{ __('dashboard.cards.stocks.title') }}</h3>
    <div>
        <div class="flex flex-col items-center space-y-3">
            <x-icons name="circle-w-check" class="w-7 h-7 text-color-15AF74"></x-icons>
            <h6 class="text-sm">{{ __('dashboard.cards.stocks.total_available') }}</h6>
            <span class="text-4xl font-black">{{ $items }}</span>
        </div>
    </div>
    <div>
        <x-primary-button href="{{ route('stocks.index') }}" class="!h-8">{{ __('dashboard.cards.stocks.cta') }}</x-primary-button>
    </div>
</div>
