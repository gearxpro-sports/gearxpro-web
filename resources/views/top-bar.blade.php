<div class="w-full py-0 xl:py-2 bg-color-18181a">
    <div class="flex justify-end">
        <div class="flex items-center justify-end w-full space-x-6 px-4">
            <div class="flex flex-1 justify-end">
                <input type="text" class="appearance-none bg-transparent border border-color-b6b9bb rounded-full w-full max-w-lg text-sm text-color-b6b9bb placeholder-color-b6b9bb focus:border-white focus:outline-none focus:ring-0" placeholder="{{ __('common.search') }}">
            </div>
            <div class="relative hover:cursor-pointer">
                <x-icons name="bell" class="text-white w-5 h-5" />
                <div class="absolute -top-2 -right-2 flex items-center justify-center bg-color-f55b3f text-white font-semibold rounded-full text-xxs w-4 h-4">12</div>
            </div>
            <a href="#" class="text-sm text-white uppercase">{{ __('common.faq') }}</a>
            <!-- Settings Dropdown -->
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="flex ">
                            <div class="flex items-center">
                                <button type="button"
                                        class="inline-flex items-center space-x-3 py-1 border border-transparent text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                                    <div
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <div class="h-8 w-8 rounded-full bg-red-500"></div>
                                    </div>
                                    <div class="flex flex-col items-start">
                                        <span class="text-white">{{ Auth::user()->fullname }}</span>
                                        <span class="text-xs text-color-b6b9bb">{{ Auth::user()->role->label }}</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</div>
