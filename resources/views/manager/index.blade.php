<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/manager/index.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="ttl">店舗代表者ホーム</h2>
            <div class="item-container">
              <p class="label">店舗名</p>
              <div class="text">{{$shop->name}}</div>
            </div>
            <div class="item-container">
              <p class="label">代表者名</p>
              <div class="text">{{$shop->user->name}}</div>
            </div>
            <form method="GET" action="{{ route('managerShops.edit', $shop->id) }}">
              @csrf
              <button class="button">店舗情報を編集する</button>
            </form>
            <form method="GET" action="{{ route('managerReserves.show', $shop->id) }}">
              @csrf
              <button class="button">予約情報一覧を見る</button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>