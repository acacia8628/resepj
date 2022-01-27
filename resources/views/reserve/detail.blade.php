<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/reserve/detail.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-manager-header/>
            </header>

            <div class="main">
              <div class="reserves-box">
                <h2 class="reserves-ttl">予約情報</h2>
                <div class="reserve">
                  <table class="table">
                    <tr>
                      <th class="th">店舗</th>
                      <td class="td">{{$reserve->shop->name}}</td>
                    </tr>
                    <tr>
                      <th class="th">予約者名</th>
                      <td class="td">{{$reserve->user->name}}さん</td>
                    </tr>
                    <tr>
                      <th class="th">予約日</th>
                      <td class="td">{{$reserve->reserve_date}}</td>
                    </tr>
                    <tr>
                      <th class="th">予約時間</th>
                      <td class="td">{{substr($reserve->reserve_time, 0, 5)}}</td>
                    </tr>
                    <tr>
                      <th class="th">人数</th>
                      <td class="td">{{$reserve->reserve_number}}人</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>