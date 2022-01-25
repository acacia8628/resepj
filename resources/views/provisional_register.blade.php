<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/provisional_register.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="content-ttl">仮会員登録ありがとうございます</h2>
            <p class="content-text">まだ本登録は完了していません。</p>
            <p class="content-text">メールアドレスを確認し、登録を完了してください。</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button class="button">
                        {{ __('メールを再送信する') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>