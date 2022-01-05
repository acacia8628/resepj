<x-guest-layout>
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

<style>
    .header{
        padding: 30px 5% 10px;
    }
    .form{
        width: 30%;
        margin: 150px auto;
        border-radius: 5px;
        box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
        background-color: #fff;
    }
    .form-ttl{
        background-color: #305DFF;
        color: #fff;
        font-weight: bold;
        padding: 20px;
        border-radius: 5px 5px 0 0;
    }
    .item-container{
        padding: 20px 20px 0 30px;
    }
    .item-container:last-child{
        padding-bottom: 20px;
    }
    .input-box{
        overflow: hidden;
        display: block;
        padding: 0 4px 0 10px;
    }
    .input{
        width: 100%;
        font-size: 100%;
        border: none;
        border-bottom: 1px solid #000;
        box-sizing: border-box;
        outline: none;
    }
    .icon{
        float: left;
        width: 25px;
        height: 25px;
        vertical-align: middle;
    }
    .button{
        background-color: #305DFF;
        color: #fff;
        border-radius: 6px;
        margin: 0 0 0 auto;
        padding-top: 5px;
        padding-bottom: 5px;
        width: 20%;
        display: block;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }
</style>