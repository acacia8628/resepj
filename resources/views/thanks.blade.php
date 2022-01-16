<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <form method="GET" action="{{ route('login') }}" class="message-form">
            @csrf
            <div class="form-content">会員登録ありがとうございます</div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('ログインする') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>