<nav class="mt-5 px-2 h-[calc(100vh-80px)] xl:h-[calc(100vh)] flex flex-col justify-between">
    <div class="space-y-2">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->is('dashboard') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="home"
                     class="{{ request()->is('dashboard') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.dashboard') }}
        </a>
        @role(App\Models\User::SUPERADMIN)
        <a href="{{ route('resellers.index') }}"
           class="{{ request()->is('dashboard/resellers*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-users
                class="{{ request()->is('dashboard/resellers*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-users>
            {{ __('navigation.resellers') }}
        </a>
        @endrole
        <a href="{{ route('customers.index') }}"
           class="{{ request()->is('dashboard/customers*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="user-w-search"
                     class="{{ request()->is('dashboard/customers*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.customers') }}
        </a>
        @role(App\Models\User::RESELLER)
        <a href="{{ route('stocks.index') }}"
           class="{{ request()->is('dashboard/stocks*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="box"
                     class="{{ request()->is('dashboard/stocks*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.stocks') }}
        </a>
        @endrole
        @role(App\Models\User::SUPERADMIN)
        <a href="{{ route('products.index') }}"
           class="{{ request()->is('dashboard/products*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="boxes"
                     class="{{ request()->is('dashboard/products*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.products') }}
        </a>
        <a href="{{ route('categories.index') }}"
           class="{{ request()->is('dashboard/categories*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="boxes"
                     class="{{ request()->is('dashboard/categories*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.categories') }}
        </a>
        @endrole
        @role(App\Models\User::RESELLER)
        <h3 class="!mt-6 !mb-2 px-3 text-xs font-medium text-color-b6b9bb uppercase">{{ __('navigation.purchasing') }}</h3>
        <a href="{{ route('supply.index') }}"
           class="{{ request()->is('dashboard/supply*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="supply"
                     class="{{ request()->is('dashboard/supply*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.supply') }}
        </a>
        @endrole
        <a href="{{ route('supply.purchases.index') }}"
           class="{{ request()->is('dashboard/purchases*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="supply"
                     class="{{ request()->is('dashboard/purchases*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            @role(App\Models\User::SUPERADMIN)
            {{ __('navigation.supply.management') }}
            @endrole
            @role(App\Models\User::RESELLER)
            {{ __('navigation.supply.purchases') }}
            @endrole
        </a>
        <h3 class="!mt-6 !mb-2 px-3 text-xs font-medium text-color-b6b9bb uppercase">{{ __('navigation.selling') }}</h3>
        <a href="{{ route('profile.edit') }}"
           class="{{ request()->is('dashboard/profile*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="agenda"
                     class="{{ request()->is('dashboard/profile*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.personal_data') }}
        </a>
        {{--        <a href="#"--}}
        {{--           class="{{ request()->is('medias*') ? 'bg-gray-900 text-white' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">--}}
        {{--            <x-heroicon-o-shopping-cart--}}
        {{--                class="{{ request()->is('medias*') ? 'text-gray-300' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-shopping-cart>--}}
        {{--            Approvvigionamento--}}
        {{--        </a>--}}
    </div>
    <div>
        <a href="#"
           class="{{ request()->is('dashboard/settings*') ? 'text-color-323a46' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-icons name="gear"
                     class="{{ request()->is('dashboard/settings*') ? 'text-color-323a46' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"/>
            {{ __('navigation.advanced_settings') }}
        </a>
    </div>
</nav>
