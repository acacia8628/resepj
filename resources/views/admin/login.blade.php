<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-admin-header/>
            </header>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('adminLogins.store') }}" class="form">
            @csrf
            <div class="form-ttl">Admin Login</div>

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
                                autofocus />
                </span>
            </div>
            @if($errors->has('email'))
            <div class="error">
                *{{$errors->first('email')}}
            </div>
            @endif

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
                                autocomplete="current-password" />
                </span>
            </div>
            @if($errors->has('password'))
            <div class="error">
                *{{$errors->first('password')}}
            </div>
            @endif

            <div class="item-container">
                <x-button class="button">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>