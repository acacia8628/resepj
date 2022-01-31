<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/manager_register.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-admin-header/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="ttl">店舗代表者作成画面</h2>
            <form method="POST" action="{{ route('adminRegisters.store') }}" class="form">
                @csrf

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

                <div class="item-container">
                    <label for="password">
                        <img src="/image/password.png" class="icon">
                    </label>
                    <span class="input-box">
                        <x-input id="password_confirmation" class="input"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Password(確認用)"
                                    />
                    </span>
                </div>

                <div class="item-container">
                    <select id="shop" name="shop_id" class="select-shop">
                        <option value="">ショップを選択する</option>
                        @foreach($shops as $shop)
                            <option value="{{$shop->id}}">
                                {{$shop->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('shop_id'))
                <div class="error">
                    *{{$errors->first('shop_id')}}
                </div>
                @endif

                <input type="hidden" name="role" value="3">
                <div class="item-container">
                    <x-button class="button">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
            <button type="button" onClick="history.back()">戻る</button>
        </div>
    </x-auth-card>
</x-guest-layout>