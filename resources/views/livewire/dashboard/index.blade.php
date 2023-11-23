<x-slot name="title">
    {{ __('dashboard.title') }}
</x-slot>

@if (!$this->reseller->tax && auth()->user()->firstname != 'Superadmin')
    <div class="w-full flex items-center justify-center">
        <div class="border max-w-xl h-fit px-8 py-12 pb-14 rounded-md flex flex-col gap-8 items-center shadow-md bg-white">
            <div>
                <svg class="w-14 h-14 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h1 class="text-2xl font-semibold text-color-18181a text-center">Indica il valore di tassazione per il tuo paese</h1>

            <form wire:submit="setTax" class="flex items-end gap-5">
                <div>
                    <x-input x-mask="99" type="text" wire:model="tax" name="tax"
                            label="{{ __('resellers.create.tax') }}" required></x-input>
                </div>

                <div class="flex items-center justify-between">
                    <x-primary-button>
                        {{ __('common.save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@else
    <div class="grid grid-cols-6 gap-4 items-stretch">
        <div class="col-span-6 lg:col-span-2">
            <livewire:dashboard.cards.stocks lazy/>
        </div>
    {{--    <div class="bg-white col-span-6 lg:col-span-2 p-4">2</div>--}}
        <div class="col-span-6 lg:col-span-4">
            <livewire:dashboard.cards.orders lazy/>
        </div>
        <div class="bg-white col-span-6 lg:col-span-3">
            <livewire:dashboard.cards.bestsellers lazy/>
        </div>
        <div class="bg-white col-span-6 lg:col-span-3">
            <livewire:dashboard.cards.new-orders lazy/>
        </div>
        <div class="bg-white col-span-6 lg:col-span-6 p-4 space-y-4">
            <div class="flex items-center justify-between border-b pb-4">
                <h3 class="text-sm font-medium">{{ __('dashboard.cards.sales.main_title') }}</h3>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <livewire:dashboard.cards.sales lazy/>
    {{--            <livewire:dashboard.cards.orders lazy/>--}}
            </div>
        </div>
    </div>
@endif


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
@endpush
