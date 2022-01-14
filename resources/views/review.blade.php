<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
            
        </x-slot>
    </x-auth-card>
</x-guest-layout>