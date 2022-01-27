<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/reserve/qr_code.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>

            <div class="main">
              <h2 class="qr-ttl">↓↓来店時、店舗スタッフに見せてください↓↓</h2>
              <div class="qr-code">
                {!! QrCode::size(250)->generate( route('reserves.show', $reserve->id) ) !!}
              </div>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>