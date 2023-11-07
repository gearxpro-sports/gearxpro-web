<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="grid grid-cols-6 gap-4">
        <div class="bg-white col-span-6 lg:col-span-1 p-4">1</div>
        <div class="bg-white col-span-6 lg:col-span-2 p-4">2</div>
        <div class="bg-white col-span-6 lg:col-span-3 p-4">3</div>
        <div class="bg-white col-span-6 lg:col-span-3 p-4">4</div>
        <div class="bg-white col-span-6 lg:col-span-3 p-4">5</div>
        <div class="bg-white col-span-6 lg:col-span-6 p-4">6</div>
    </div>
</x-app-layout>
