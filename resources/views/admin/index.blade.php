<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>
        <a href="{{ route('admin.managerRegister') }}">店舗代表者を作成</a>
        <a href="{{ route('admin.shopRegister') }}">店舗を作成</a>

    </x-auth-card>
</x-guest-layout>