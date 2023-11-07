<div class="h-screen bg-color-18181a grid place-items-center">
    <div class="bg-color-edebe5 w-full max-w-3xl p-10 md:p-20 md:rounded">
        <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class="w-56">
        <div class="mt-11">
            <h2 class="text-xl font-semibold text-color-18181a">{{ __('shop.splash.title') }}</h2>
            <div class="mt-7 grid grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($resellers as $country_id => $reseller)
                    <div wire:click="setCountry('{{ $reseller->first()->country->iso2_code }}')"
                         class="group inline-flex items-center space-x-2 text-color-18181a px-3 py-1 rounded hover:cursor-pointer">
                        <img
                            src="https://flagcdn.com/w320/{{strtolower($reseller->first()->country->iso2_code)}}.png"
                            alt="" class="w-7 rounded-sm shadow-md transition group-hover:shadow-none">
                        <span
                            class="text-xs font-medium transition group-hover:text-color-6c757d">{{ $reseller->first()->country->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
