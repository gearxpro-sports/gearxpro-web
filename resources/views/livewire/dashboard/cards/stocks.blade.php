<div class="flex flex-col justify-between text-center bg-white p-4 h-[294px]">
    <h3 class="text-sm font-medium text-center border-b pb-4">
        @if(auth()->user()->hasRole(\App\Models\User::SUPERADMIN))
            {{ __('dashboard.cards.stocks.admin_title') }}
        @elseif(auth()->user()->hasRole(\App\Models\User::RESELLER))
            {{ __('dashboard.cards.stocks.reseller_title') }}
        @endif
    </h3>
    <div>
        <div class="flex flex-col items-center space-y-3">
            <x-icons name="circle-w-check" class="w-7 h-7 text-color-15AF74"></x-icons>
            <h6 class="text-sm">{{ __('dashboard.cards.stocks.total_available') }}</h6>
            <span class="text-4xl font-black">{{ $items }}</span>
        </div>
    </div>
    <div>
        @if(auth()->user()->hasRole(\App\Models\User::SUPERADMIN))
            <x-primary-button href="{{ route('products.index') }}" class="!h-8">{{ __('dashboard.cards.stocks.cta') }}</x-primary-button>
        @elseif(auth()->user()->hasRole(\App\Models\User::RESELLER))
            <x-primary-button href="{{ route('stocks.index') }}" class="!h-8">{{ __('dashboard.cards.stocks.cta') }}</x-primary-button>
        @endif
    </div>
</div>
