<x-guest-layout>
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
                      <img class="reserve-delete__img" src="/image/close.png">
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

<style>
    .header{
      padding: 30px 5% 10px;
    }
    .user-name{
      text-align: center;
      font-size: 32px;
      font-weight: bold;
    }
    .main{
      display: flex;
    }
    .reserves-box{
      width: 30%;
      padding: 50px 10%;
    }
    .reserves-ttl{
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .reserve{
      position: relative;
      background-color: #305DFF;
      margin-bottom: 30px;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
    }
    .reserve-ttl{
      display: flex;
      align-items: center;
    }
    .reserve-ttl__img{
      width: 20px;
      height: 20px;
      margin-right: 20px;
    }
    .reserve-ttl__ttl{
      color: #fff;
    }
    .table{
      margin-top: 20px;
      color: #fff;
    }
    .th,
    .td{
      padding: 10px;
      text-align: left;
      font-size: 14px;
    }
    .reserve-delete{
      position: absolute;
      top: 25px;
      right: 25px;
      cursor: pointer;
    }
    .reserve-delete__img{
      width: 20px;
      height: 20px;
    }
    .reserve-delete__input{
      opacity: 0;
      position: absolute;
      cursor: pointer;
      width: 25px;
      height: 25px;
      top: 0;
      left: 0;
      z-index: 2;
    }
    .likes-box{
      width: 50%;
      padding: 50px 10%;
    }
    .likes-ttl{
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .likes{
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .card{
      width: 45%;
      border-radius: 3px;
      box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
      margin-bottom: 30px;
    }
    .card__text-box{
      padding: 15px;
    }
    .card__content-img{
      text-align: center;
    }
    .card__img{
      width: 100%;
      object-fit: cover;
      border-radius: 3px 3px 0 0;
    }
    .card__hash{
      display: flex;
    }
    .card__hash--area,
    .card__hash--genre{
      font-size: 10px;
      margin: 5px 3px 0 0;
    }
    .card__action{
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
    }
    .card__action--button{
      background-color: #305DFF;
      color: #fff;
      padding: 5px 10px;
      border-radius: 6px;
      display: block;
      font-size: 12px;
      border: none;
      cursor: pointer;
    }
    .card__action--like-box{
      position: relative;
    }
    .card__action--like{
      width: 25px;
      height: 25px;
    }
    .card__action--like-input{
      opacity: 0;
      position: absolute;
      cursor: pointer;
      width: 25px;
      height: 25px;
      top: 0;
      left: 0;
      z-index: 2;
    }
</style>