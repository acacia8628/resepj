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
                @foreach($reserves as $reserve)
                <div class="reserve">
                  <div class="reserve-ttl">
                    <img src="/image/time.png" class="reserve-ttl__img">
                    <p class="reserve-ttl__ttl">予約{{$loop->iteration}}</p>
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
                      <td class="td">{{substr($reserve->reserve_time, 0, 5)}}</td>
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
                    <input class="reserve-delete__input" type="submit" name="delete" value="{{$reserve->id}}">
                  </form>
                  <form method="GET" action="{{ route('reserves.edit',$reserve->id) }}" class="reserve-edit">
                    @csrf
                    <button class="reserve-edit__button">変更</button>
                  </form>
                  <form method="GET" action="{{ route('qrCodes.show', $reserve->id) }}">
                    @csrf
                    <button class="reserve-qr__button">QRコードの表示</button>
                  </form>
                </div>
                @endforeach
                <div class="reserve-history">
                  <form method="GET" action="{{ route('users.show',$user->id) }}" class="reserve-history__form">
                    @csrf
                    <img src="/image/history.png" class="reserve-history__img">
                    <button class="reserve-history__button">予約履歴を見る</button>
                  </form>
                </div>
              </div>
              <div class="likes-box">
                <h2 class="likes-ttl">お気に入り店舗</h2>
                <div class="likes">
                @foreach($user->likes as $like)
                  <div class="card">
                    <img class="card__img" src="{{ asset('storage/'.$like->shop->img_path) }}"/>
                    <div class="card__text-box">
                      <div class="card__ttl-box">
                        <h2 class="card__name">{{$like->shop->name}}</h2>
                        <div class="average-score">
                          <div class="average-score-display">
                            {{$like->shop->score_avg()}}
                          </div>
                          <div class="star-rating">
                            <div class="star-rating-front"
                                    style="width: {{$like->shop->score_avg_percentage()}}%"
                              >★★★★★</div>
                            <div class="star-rating-back">★★★★★</div>
                          </div>
                        </div>
                      </div>
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