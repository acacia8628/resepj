<button type="button" onClick="history.back()">戻る</button>
@if(!empty($reserves[0]))
<form method="GET" action="{{ route('manager.allSend') }}">
  @csrf
  <input type="hidden" name="shop_id" value="{{$shop->id}}">
  <button>予約者全員に送信</button>
</form>
@endif
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
  </div>
  <form method="GET" action="{{ route('manager.individualSend') }}">
    @csrf
    <input type="hidden" name="shop_name" value="{{$reserve->shop->name}}">
    <input type="hidden" name="user_id" value="{{$reserve->user_id}}">
    <button>メールを送信する</button>
  </form>
  @endforeach
</div>