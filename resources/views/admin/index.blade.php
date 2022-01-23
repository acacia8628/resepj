<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="ttl">管理者ホーム</h2>
            <div class="link-box">
                <a href="{{ route('admin.managerRegister') }}" class="link">店舗代表者を作成</a>
                <a href="{{ route('admin.shopRegister') }}" class="link">店舗を作成</a>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>