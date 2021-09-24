<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des fournisseurs/Preneurs') }}
        </h2>
    </x-slot>

    <livewire:clients />
</x-app-layout>
