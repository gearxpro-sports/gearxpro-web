<div class="bg-color-f2f0eb px-[195px] pt-[70px] pb-[284px] flex gap-[126px]">
    <div class="w-[624px]">
        <div class="mb-[30px]">
            <h2 class="text-[33px] font-semibold leading-[40px] text-color-18181a mb-[10px]">{{ __('shop.checkout.option_next') }}</h2>
            <p class="text-[17px] leading-[20px] text-color-18181a font-normal">{{ __('shop.checkout.login_checkout') }}</p>
        </div>

        <form wire:submit="login" class="mb-[70px]">
            <div class="w-full flex flex-col gap-1">
                <label for="email" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('shop.checkout.email') }}</label>
                <input wire:model="email" type="text" name="email" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0">
            </div>

            <div x-data="{showPassword: false}" class="w-full flex flex-col gap-1 mt-[23px] mb-[40px] relative">
                <label for="password" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('auth.login.password.label') }}</label>
                <input wire:model="password" x-bind:type="showPassword ? 'text' : 'password'" name="password" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0">
                <div @click="showPassword = !showPassword"
                    class="flex items-center justify-center absolute z-[1] inset-y-1 right-4 top-[25px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                    <template x-if="showPassword">
                        <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                    </template>
                    <template x-if="!showPassword">
                        <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                    </template>
                </div>
            </div>

            <button type="submit" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('auth.login.submit') }}</span>
                <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
            </button>
        </form>

        <div class="w-full bg-color-18181a h-[2px] shadow-shadow-4 mb-[42px]"></div>

        <div class="mb-[30px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[10px]">{{ __('shop.checkout.not_profile') }}</h2>
            <p class="text-[15px] leading-[21px] text-color-18181a font-normal">{{ __('shop.checkout.register') }}</p>
        </div>

        <a href="/shop/register" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
            <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('shop.checkout.button_register') }}</span>
            <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
        </a>
    </div>

    <div class="w-[813px] h-fit rounded-md border border-color-e0e0df bg-color-edebe5 py-[30px] px-[37px]">
        <div class="mb-[30px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[16px]">{{ __('shop.checkout.next_to_guest') }}</h2>
            <p class="text-[17px] leading-[20px] text-color-18181a font-normal">{{ __('shop.checkout.pay_to_guest') }}</p>
        </div>

        <div class="w-full flex flex-col gap-1">
            <label for="email" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('shop.checkout.email') }}</label>
            <input wire:model="email" type="text" name="email" class="h-[48px] px-4 rounded-md bg-color-f2f0eb p-0 border-color-e0e0df focus:border-transparent focus:ring-0">
        </div>

        <div class="flex items-start gap-1 mt-5 mb-[30px]">
            <x-checkbox-2 wire:model="privacy" :required="true" :name="'privacy'" />
            <p class="tex-[13px] leading-[18px] text-color-18181a">{{ __('shop.checkout.privacy')}}</p>
        </div>

        <button wire:click="next" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-white border border-color-18181a group">
            <span class="z-10 text-[15px] font-semibold text-color-18181a leading-[19px] group-hover:text-white">{{ __('shop.checkout.button_next') }}</span>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-18181a group-hover:animate-line group-hover:w-full"></div>
        </button>
    </div>
</div>
