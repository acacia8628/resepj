<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
            <div class="user-name">{{$user->name}}さん</div>
            <div class="main">
              <div class="reserves-box">
                <h2 class="reserves-ttl">予約状況</h2>
                @foreach($user->reserves as $reserve)
                <div class="reserve">
                  <div class="reserve-ttl">
                    <img src="/image/time.png" class="reserve-ttl__img">
                    <p class="reserve-ttl__ttl">予約{{$loop->index+1}}</p>
                  </div>
                  <table class="table">
                    <tr>
                      <th class="th">Shop</th>
                      <td class="td">{{$reserve->shop->name}}</td>
                    </tr>
                    <tr>
                      <th class="th">Date</th>
                      <td class="td">{{$reserve->reserve_date}}</td>
                    </tr>
                    <tr>
                      <th class="th">Time</th>
                      <td class="td">{{$reserve->reserve_time}}</td>
                    </tr>
                    <tr>
                      <th class="th">Number</th>
                      <td class="td">{{$reserve->reserve_number}}人</td>
                    </tr>
                  </table>
                  <form method="POST" action="{{ route('reserves.destroy', $reserve->id) }}" class="reserve-delete">
                      @csrf
                      <img class="reserve-delete__img" src="/image/delete.png">
                      <input type="hidden" name="_method" value="DELETE">
                      <input class="reserve-delete__input" type="submit" name="reserve_id" value="{{$reserve->id}}">
                  </form>
                </div>
                @endforeach
              </div>
              <div class="likes-box">
                <h2 class="likes-ttl">お気に入り店舗</h2>
                <div class="likes">
                @foreach($user->likes as $like)
                  <div class="card">
                    <div class="card__content-img">
                      <img class="card__img" src="{{$like->shop->img_url}}"/>
                    </div>
                    <div class="card__text-box">
                      <h2 class="card__name">{{$like->shop->name}}</h2>
                      <div class="card__hash">
                        <p class="card__hash--area">#{{$like->shop->area->name}}</p>
                        <p class="card__hash--genre">#{{$like->shop->genre->name}}</p>
                      </div>
                      <div class="card__action">
                        <form method="GET" action="{{ route('shop.show',$like->shop->id) }}">
                          @csrf
                          <button class="card__action--button">詳しく見る</button>
                        </form>
                        @if($like->shop->is_liked_by_auth_user())
                        <form method="POST" action="{{ route('likes.destroy', $like->shop->id) }}" class="card__action--like-box">
                          @csrf
                          <img class="card__action--like" src="/image/heart2.png">
                          <input type="hidden" name="_method" value="DELETE">
                          <input class="card__action--like-input" type="submit" name="shop_id">
                        </form>
                        @else
                        <form method="POST" action="{{ route('likes.store') }}" class="card__action--like-box">
                          @csrf
                          <img class="card__action--like" src="/image/heart.png">
                          <input class="card__action--like-input" type="submit" name="shop_id" value="{{$like->shop->id}}">
                        </form>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>