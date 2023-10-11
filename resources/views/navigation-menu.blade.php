<nav class="mt-5 px-2 h-[calc(100vh-80px)] flex flex-col justify-between">
    <div class="space-y-2">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-home
                class="{{ request()->is('/') ? 'text-gray-300' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-home>
            Dashboard
        </a>
        <a href="#"
           class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-users
                class="{{ request()->is('/') ? 'text-gray-300' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-users>
            Rivenditori
        </a>
{{--        <h3 class="!mt-6 !mb-2 px-3 text-xs font-medium text-color-b6b9bb uppercase">Acquisti</h3>--}}
{{--        <a href="#"--}}
{{--           class="{{ request()->is('medias*') ? 'bg-gray-900 text-white' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">--}}
{{--            <x-heroicon-o-shopping-cart--}}
{{--                class="{{ request()->is('medias*') ? 'text-gray-300' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-shopping-cart>--}}
{{--            Approvvigionamento--}}
{{--        </a>--}}
    </div>
    <div>
        <a href="#"
           class="{{ request()->is('settings*') ? 'bg-gray-900 text-white' : 'text-color-6c757d hover:text-color-323a46' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-wrench-screwdriver
                class="{{ request()->is('settings*') ? 'text-gray-300' : 'text-color-6c757d group-hover:text-color-323a46' }} mr-3 flex-shrink-0 h-5 w-5"></x-heroicon-o-wrench-screwdriver>
            Impostazioni Avanzate
        </a>
    </div>
</nav>
