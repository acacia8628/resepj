<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
            <div class="form-ttl">Login</div>

            <!-- Email Address -->
            <div class="item-container">
                <label for="email">
                    <img src="/image/email.png" class="icon">
                </label>
                <span class="input-box">
                    <x-input id="email" class="input"
                                type="email"
                                name="email"
                                :value="old('email')"
                                placeholder="Email"
                                required autofocus />
                </span>
            </div>

            <!-- Password -->
            <div class="item-container">
                <label for="password">
                    <img src="/image/password.png" class="icon">
                </label>
                <span class="input-box">
                    <x-input id="password" class="input"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />
                </span>
            </div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>