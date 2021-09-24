<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des commandes en attentes de réception:') }}
        </h2>
    </x-slot>

    <livewire:commandes />
</x-app-layout>
