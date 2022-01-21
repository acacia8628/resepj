<button type="button" onClick="history.back()">戻る</button>
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
  @endforeach
</div>