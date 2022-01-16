<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/done.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <form method="GET" action="{{ route('shop.index') }}" class="message-form">
            @csrf
            <div class="form-content">ご予約ありがとうございます</div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('戻る') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>