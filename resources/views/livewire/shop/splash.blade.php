<div class="h-screen bg-color-18181a grid place-items-center">
    <div class="bg-color-edebe5 w-full max-w-3xl p-10 md:p-20 md:rounded">
        <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class="w-56">
        <div class="mt-11">
            <h2 class="text-xl font-semibold text-color-18181a">{{ __('shop.splash.title') }}</h2>
            <div class="mt-7 grid grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($resellers as $country_id => $reseller)
                    <div wire:click="setCountry('{{ $reseller->first()->country->iso2_code }}')"
                         class="group inline-flex items-center space-x-2 text-color-18181a px-3 py-1 rounded hover:cursor-pointer">
                        <img
                            src="https://flagcdn.com/w320/{{strtolower($reseller->first()->country->iso2_code)}}.png"
                            alt="" class="w-7 rounded-sm shadow-md transition group-hover:shadow-none">
                        <span
                            class="text-xs font-medium transition group-hover:text-color-6c757d">{{ $reseller->first()->country->name }}</span>
                    </div>
                @empty
                    <p class="flex items-center space-x-4 w-full text-sm text-gray-600 whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        <span>{{ __('common.no_resellers') }}</span>
                    </p>
                @endforelse
        </div>
    </div>
</div>
