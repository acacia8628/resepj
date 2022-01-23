<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/manager/reserve.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <div class="content">
            <h2 class="ttl">予約状況</h2>

            @if(!empty($reserves[0]))
            <form method="GET" action="{{ route('manager.allSend') }}">
              @csrf
              <input type="hidden" name="shop_id" value="{{$shop->id}}">
              <button class="button">予約者全員にメールを送信</button>
            </form>
            @endif

            <div class="reserves-box">
              @foreach($reserves as $reserve)
              <div class="reserve">
                <div class="reserve-ttl">
                  <p class="reserve-ttl__ttl">予約{{$loop->iteration}}</p>
                </div>
                <table class="table">
                  <tr>
                    <th class="th">代表者</th>
                    <td class="td">{{$reserve->user->name}}</td>
                  </tr>
                  <tr>
                    <th class="th">日付</th>
                    <td class="td">{{$reserve->reserve_date}}</td>
                  </tr>
                  <tr>
                    <th class="th">時間</th>
                    <td class="td">{{substr($reserve->reserve_time, 0, 5)}}</td>
                  </tr>
                  <tr>
                    <th class="th">人数</th>
                    <td class="td">{{$reserve->reserve_number}}人</td>
                  </tr>
                </table>
                <form method="GET" action="{{ route('manager.individualSend') }}">
                  @csrf
                  <input type="hidden" name="shop_name" value="{{$reserve->shop->name}}">
                  <input type="hidden" name="user_id" value="{{$reserve->user_id}}">
                  <button class="reserve__button">メールを送信する</button>
                </form>
              </div>
              @endforeach
            </div>
            <button type="button" onClick="history.back()">戻る</button>
        </div>
        {{$reserves->appends(request()->input())->links()}}
    </x-auth-card>
</x-guest-layout>


