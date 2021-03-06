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
                            autofocus />
                </span>
            </div>
            @if($errors->has('name'))
            <div class="error">
                *{{$errors->first('name')}}
            </div>
            @endif

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
                                autocomplete="new-password" />
                </span>
            </div>
            @if($errors->has('password'))
            <div class="error">
                *{{$errors->first('password')}}
            </div>
            @endif

            <!-- Confirm Password -->
            <div class="item-container">
                <label for="password">
                    <img src="/image/password.png" class="icon">
                </label>
                <span class="input-box">
                    <x-input id="password_confirmation" class="input"
                                type="password"
                                name="password_confirmation"
                                placeholder="Password(?????????)"
                                />
                </span>
            </div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('??????') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>