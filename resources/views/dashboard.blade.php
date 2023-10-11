<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-6 gap-4">
        <div class="bg-white p-4">1</div>
        <div class="bg-white col-span-2 p-4">2</div>
        <div class="bg-white col-span-3 p-4">3</div>
        <div class="bg-white col-span-3 p-4">4</div>
        <div class="bg-white col-span-3 p-4">5</div>
        <div class="bg-white col-span-6 p-4">6</div>
    </div>
</x-app-layout>
