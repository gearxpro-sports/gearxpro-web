<div class="pt-[66px] pb-[222px] pl-[351px] pr-[384px] flex gap-[70px]">
    <div class="w-[365px]">
        <h1 class="text-[33px] font-semibold leading-[40px] text-color-18181a capitalize mb-[30px]">Pagamento</h1>

        {{-- tabs --}}
        <div class="mb-[40px] flex flex-col gap-[10px]">
            @foreach ($tabs as $key => $tab )
                <button wire:click="changeTab({{$key}})"
                @if ($key != 0 AND !$dataUser) disabled @endif
                @class([
                    "w-[365px] h-[80px] rounded-md flex flex-col items-center justify-center gap-1 text-[15px] font-medium leading-[19px] text-color-6c757d capitalize",
                    $key == $currentTab ? '!bg-color-18181a !text-white' : 'text-color-6c757d bg-color-edebe5',])
                >
                    @if ($key == $currentTab)
                        <x-icons :name="$tab['icon-on']"/>
                    @else
                        <x-icons :name="$tab['icon-off']"/>
                    @endif
                    <span>{{$tab['text']}}</span>
                </button>
            @endforeach
        </div>

        {{-- dettaglio carrello --}}
        <div class="mb-[30px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">Nel tuo carrello</h2>

            <div class="flex items-center justify-between mb-5">
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">Subtotale</span>
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">€ 70,00</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">Costi di spedizione</span>
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">Gratuita</span>
            </div>

            <div class="border-y border-color-18181a h-[61px] flex items-center justify-between mt-[25px]">
                <span class="text-[15px] font-medium leading-[16px] text-color-18181a">Totale</span>
                <span class="text-[15px] font-semibold  leading-[16px] text-color-18181a">€ 70,00</span>
            </div>
        </div>

        {{-- prodotti in carrello --}}
        <div>
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">{{__('shop.payment.articols')}}</h2>

            @foreach ($cart as $product )
                <div class="flex gap-5 border border-color-f2f0eb bg-color-f2f0eb shadow p-1">
                    <div class="w-[116px] h-[120px] overflow-hidden bg-color-edebe5">
                        <img src="" alt="">
                    </div>

                    <div class="my-auto">
                        <h4 class="text-[13px] font-semibold leading-[24px] text-color-18181a">{{$product['name']}}</h4>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.color')}}: {{$product['color']}}</p>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.size')}}: {{$product['size']}}</p>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.amount')}}: {{$product['quantity']}}</p>
                        <p class="text-[13px] font-medium leading-[24px] text-color-18181a">{{$money}} {{number_format($product['price'], 2, ',', '.')}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    @if ($currentTab == 0)
        <form wire:submit="getDataUser" class="pt-[90px] w-[750px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">Indirizzo</h2>

            <div class="flex gap-5">
                <x-input-text wire:model="name" width="w-1/2" name="name" label="name" required="true" />
                <x-input-text wire:model="lastName" width="w-1/2" name="lastName" label="lastName" required="true" />
            </div>

            <div class="flex gap-5 my-[23px]">
                <x-input-text wire:model="address" width="w-[494px]" name="address" label="address" required="true" />
                <x-input-text wire:model="cap" width="grow" name="cap" label="cap" required="true" />
            </div>

            <x-input-text wire:model="specific" width="w-full" name="specific" label="specific" required="" />

            <div class="flex gap-5 mt-[23px]">
                <x-input-text wire:model="city" width="w-1/3" name="city" label="city" required="true" />
                <x-select-custom wire:model="province" width="w-1/3" name="province" label="province" required="true">
                    <option selected value=""></option>
                    <option value="pr-a">a</option>
                    <option value="pr-n">n</option>
                </x-select-custom>
                <x-select-custom wire:model="nation" width="w-1/3" name="nation" label="nation" required="true">
                    <option selected value=""></option>
                    <option value="nt-a">a</option>
                    <option value="nt-a">n</option>
                </x-select-custom>
            </div>

            <div class="flex gap-5 mt-[23px]">
                <x-input-text wire:model="email" width="w-1/2" name="email" label="email" required="true" />
                <x-input-text wire:model="telephone" width="w-1/2" name="telephone" label="telephone" required="true" />
            </div>

            <div class="mt-[42px] flex items-center justify-between">
                <x-custom-button-2 :text="__('shop.payment.button_back')" :icon="'back'" :link="'/shop/cart'" width="w-[221px]"/>
                <x-custom-button-4 :text="__('shop.payment.button_next_pay')" :icon="'pay'" width="w-[275px]" />
            </div>
        </form>
    @endif

    @if ($currentTab == 1)
        <div class="pt-[90px] w-[750px]">

            <div class="w-full space-y-[15px]">
                {{-- Indirizzo --}}
                <div class="w-full h-[197px] py-[24px] px-[21px] border border-color-e0e0df rounded-md">
                    <div class="flex items-center gap-2">
                        <x-icons name="flag_ON"/>
                        <h3 class="text-[15px] font-semibold leading-[19px] text-color-18181a">Indirizzo</h3>
                    </div>

                    <h3 class="text-[13px] font-semibold leading-[24px] text-color-323a46 mt-[25px] mb-[5px]">Giancarlo Ferraro</h3>

                    <div class="text-[13px] font-medium flex gap-[15px]">
                        <div class="flex flex-col gap-[5px] min-w-[60px] text-color-6c757d">
                            <span>Indirizzo:</span>
                            <span>Email:</span>
                            <span>Telefono:</span>
                        </div>
                        <div class="flex flex-col gap-[5px]  text-color-323a46">
                            <span>Via Jacopino da Tradate 47,  20155, Milano, Milano, Italia</span>
                            <span>giancarloferraro@gmail.com</span>
                            <span>+39 338 412 2887</span>
                        </div>
                    </div>
                </div>

                {{-- spedizione --}}
                <div class="w-full h-[99px] py-[24px] px-[21px] border border-color-e0e0df rounded-md">
                    <div class="flex items-center gap-2">
                        <x-icons name="flag_ON"/>
                        <h3 class="text-[15px] font-semibold leading-[19px] text-color-18181a">Spedizione Gratuita</h3>
                    </div>

                    <p class="text-[13px] font-medium text-color-6c757d mt-[15px]">Spedizione stimata in 5-7 giorni.</p>
                </div>
            </div>

            <div class="w-full mt-[30px]">
                <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a">Metodo di pagamento</h2>

                <div class="w-full h-[73px] mt-[15px] bg-color-f5e3d7 py-[18px] px-[21px] flex items-center justify-between gap-[35px] rounded-md">
                    <p class="text-[13px] font-medium leading-[20px] text-color-6c757d">I pagamenti sono crittografati con SSL per garantire la massima sicurezza della  tua carta di credito
                        e dei tuoi dati di pagamento.</p>
                    <x-icons name="trust" />
                </div>

                <form wire:submit="getDataPayment" class="mt-5">
                    <x-input-text wire:model="creditCard" width="w-full" name="creditCard" label="creditCard" required="true" />

                    <div class="flex gap-5 my-5">
                        <x-input-text wire:model="expiration" width="w-1/2" name="expiration" label="expiration" required="true" />
                        <x-input-text wire:model="ccv" width="w-1/2" name="ccv" label="ccv" required="true" />
                    </div>

                    <x-input-text wire:model="accountHolder" width="w-full" name="accountHolder" label="accountHolder" required="true" />

                    <div class="mt-[42px] flex items-center justify-between">
                        <x-custom-button-2 :text="__('shop.payment.button_back')" :icon="'back'" :link="'/shop/cart'" width="w-[221px]"/>
                        <x-custom-button-4 :text="__('shop.payment.pay')" :icon="'pay'" width="w-[165px]" />
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

