<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/shop_register.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-admin-header/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="ttl">新規店舗作成画面</h2>
            <form method="POST" action="{{ route('adminShops.store') }}" class="form">
                @csrf
                <select id="area" name="area_id" class="select">
                    <option value="">店舗のエリアを選択してください</option>
                    @foreach($areas as $area)
                        <option value="{{$area->id}}">
                            {{$area->name}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('area_id'))
                <div class="error">
                    *{{$errors->first('area_id')}}
                </div>
                @endif

                <select id="genre" name="genre_id" class="select">
                    <option value="">店舗のジャンルを指定してください</option>
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">
                            {{$genre->name}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('genre_id'))
                <div class="error">
                    *{{$errors->first('genre_id')}}
                </div>
                @endif

                <div class="item-container">
                    <span class="input-box">
                        <x-input id="shop_name" class="input"
                                type="text"
                                name="shop_name"
                                :value="old('shop_name')"
                                placeholder="shop_name"
                                autofocus />
                    </span>
                </div>
                @if($errors->has('shop_name'))
                <div class="error">
                    *{{$errors->first('shop_name')}}
                </div>
                @endif

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