<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <div class="form-ttl">Registration</div>

            <!-- Name -->
            <div class="item-container">
                <label for="name">
                    <img src="/image/man.png" class="icon">
                </label>
                <span class="input-box">
                    <x-input id="name" class="input"
                            type="text"
                            name="name"
                            :value="old('name')"
                            placeholder="Username"
                            required autofocus />
                </span>
            </div>

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
                                required autocomplete="new-password" />
                </span>
            </div>

            <!-- Confirm Password -->
            <div class="item-container">
                <label for="password">
                    <img src="/image/password.png" class="icon">
                </label>
                <span class="input-box">
                    <x-input id="password_confirmation" class="input"
                                type="password"
                                name="password_confirmation"
                                placeholder="Password(確認用)"
                                required/>
                </span>
            </div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>