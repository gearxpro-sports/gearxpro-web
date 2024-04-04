<x-slot name="title">
    {{ __('dashboard.title') }}
</x-slot>

    <div x-init="$wire.checkResellerMissingData" class="grid grid-cols-6 gap-4 items-stretch">
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
@endpush
