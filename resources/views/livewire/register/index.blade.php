<div class="relative">
    <a href="{{route('shop.checkout', ['country_code' => session('country_code')])}}" class="xl:hidden absolute top-20 left-4">
        <x-icons name="chevron-left-xl" />
    </a>

    <form wire:submit="store" class="w-full xl:w-[594px] px-4 pt-28 pb-16 xl:mt-[70px] m-auto">
        <h2 class="text-xl xl:text-[33px] font-semibold leading-[40px] text-color-18181a xl:mb-[14px]">Crea il tuo profilo</h2>
        <p class="text-sm xl:text-[17px] leading-[20px] text-color-18181a mb-4 xl:mb-[30px]">Completa questi piccoli step per continuare il tuo acquisto</p>

        <div class="flex flex-col gap-[20px] mb-[30px]">
            <x-input-text wire:model="firstname" width="w-full" name="firstname" label="firstname" required="true" />
            <x-input-text wire:model="lastname" width="w-full" name="lastname" label="lastname" required="true" />
            <x-input-text wire:model="email" width="w-full" name="email" label="email" required="true" />

            <div>
                <div x-data="{showPassword: false}" class="w-full flex flex-col gap-1 relative">
                    <label for="password" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('auth.login.password.label') }}*</label>
                    <div class="w-full flex flex-col gap-1 relative">
                        <input wire:model.live="password" x-bind:type="showPassword ? 'text' : 'password'" name="password" id="password" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0">
                        <div @click="showPassword = !showPassword"
                            class="flex items-center justify-center absolute z-[1] inset-y-1 right-3 top-[5px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                            <template x-if="showPassword">
                                <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                            </template>
                            <template x-if="!showPassword">
                                <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                            </template>
                        </div>
                    </div>
                    <div class="absolute bottom-[-20px] right-0">@error('password') <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror</div>
                </div>
                <div class="text-[12px] text-color-6c757d mt-[5px]">
                    <p>Assicurati che la password abbia almeno:</p>
                    <ul class="list-disc pl-[15px] pr-[5px]">
                        @foreach ($formatPassword as $key => $format)
                            <li>
                                @if (in_array($key, $keyFormat))
                                    <div @class(["flex justify-between text-color-15af2d"])>
                                        {{ $format }}
                                        <x-icons name="check-format" class="text-color-15af2d" />
                                    </div>
                                @else
                                    <div @class(["flex justify-between"])>
                                        {{ $format }}
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div x-data="{password_confirmation: false}" class="w-full flex flex-col gap-1 relative">
                <label for="password_confirmation" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('shop.payment.confirmPassword') }}*</label>
                <div class="w-full flex flex-col gap-1 relative">
                    <input wire:model.live="password_confirmation" x-bind:type="password_confirmation ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0">
                    <div @click="password_confirmation = !password_confirmation"
                        class="flex items-center justify-center absolute z-[1] inset-y-1 right-3 top-[5px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                        <template x-if="password_confirmation">
                            <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                        </template>
                        <template x-if="!password_confirmation">
                            <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                        </template>
                    </div>
                </div>
                <div class="absolute bottom-[-20px] right-0">@error('password') <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror</div>
            </div>
        </div>


        <button type="submit" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
            <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('shop.checkout.button_register') }}</span>
            <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
        </button>
    </form>
</div>
