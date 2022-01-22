<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>

            <div class="content">
              <div class="detail">
                <div class="detail-ttl">
                  <div class="detail-ttl__ttl-box">
                    <button type="button" onClick="history.back()" class="detail-ttl__back">
                      <
                    </button>
                    <h2 class="detail-ttl__ttl">{{$shop->name}}</h2>
                  </div>
                  <div class="average-score">
                    <div class="average-score-display">
                      {{$shop->score_avg()}}
                    </div>
                    <div class="star-rating">
                      <div class="star-rating-front"
                              style="width: {{$shop->score_avg_percentage()}}%"
                        >★★★★★</div>
                      <div class="star-rating-back">★★★★★</div>
                    </div>
                  </div>
                </div>
                <img src="{{ asset('storage/'.$shop->img_path) }}" class="detail-img">
                <div class="detail-hash">
                  <p class="detail-hash__area">#{{$shop->area->name}}</p>
                  <p class="detail-hash__genre">#{{$shop->genre->name}}</p>
                </div>
                <div class="detail-overview">
                  {{$shop->overview}}
                </div>

                @if(!empty($reviews[0]))
                <div class="review">
                  <h2 class="review-ttl">お客様の声</h2>
                  @foreach($reviews as $review)
                  <div class="review-content">
                    <div class="score">
                      <img src="/image/people.png" class="score-img-people">
                      <div class="star-rating">
                        <div class="star-rating-front"
                                style="width: {{$review->score_percentage()}}%"
                          >★★★★★</div>
                        <div class="star-rating-back">★★★★★</div>
                      </div>
                    </div>
                    <div class="comment">
                      {{$review->comment}}
                    </div>
                  </div>
                  @endforeach
                  <form method="GET" action="{{ route('reviews.show',$shop->id) }}" class="review-form">
                    @csrf
                    <img src="/image/comment.png" class="review-form__img">
                    <button class="review-form__button">すべてのお客様の声を見る</button>
                  </form>
                </div>
                @else
                <div class="review">
                  <h2 class="review-ttl">お客様の声</h2>
                  <p class="review-no-content">まだお客様の声はありません。</p>
                  <form method="GET" action="{{ route('reviews.show',$shop->id) }}" class="review-form">
                    @csrf
                    <img src="/image/comment.png" class="review-form__img">
                    <button class="review-form__button">お客様の声を投稿する</button>
                  </form>
                </div>
                @endif
              </div>

              <form method="POST" action="{{ route('reserves.store') }}" class="reserve">
                @csrf
                <h2 class="reserve-ttl">予約</h2>
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                @if($errors->has('shop_id'))
                <div class="error">
                  *{{$errors->first('shop_id')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <input type="date" name="r_date"
                            id="r_date"
                            onchange="inputDate()"
                            value="{{ old('r_date') }}"
                            class="reserve-input">
                </div>
                @if($errors->has('r_date'))
                <div class="error">
                  *{{$errors->first('r_date')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <select name="r_time" onchange="inputTime(this);" class="reserve-input__time">
                    <option value="">-- 予約時間 --</option>
                    @foreach($times as $time)
                      <option value="{{$time}}" @if($time == old('r_time')) selected @endif >{{substr($time, 0, 5)}}</option>
                    @endforeach
                  </select>
                </div>
                @if($errors->has('r_time'))
                <div class="error">
                  *{{$errors->first('r_time')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <select name="r_number" onchange="inputNumber(this);" class="reserve-input__number">
                    <option value="">-- 予約人数 --</option>
                    @foreach($numbers as $number)
                      <option value="{{$number}}" @if($number == old('r_number')) selected @endif >{{$number}}人</option>
                    @endforeach
                  </select>
                </div>
                @if($errors->has('r_number'))
                <div class="error">
                  *{{$errors->first('r_number')}}
                </div>
                @endif

                <div class="check">
                  <table class="table">
                    <tr>
                      <th class="th">Shop</th>
                      <td class="td">{{$shop->name}}</td>
                    </tr>
                    <tr>
                      <th class="th">Date</th>
                      <td class="td">
                        <div id="date">{{ \Carbon\Carbon::now()->format("Y/m/d") }}</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Time</th>
                      <td class="td">
                        <div id="time">17:00</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Number</th>
                      <td class="td">
                        <div id="number">1人</div>
                      </td>
                    </tr>
                  </table>
                </div>
                <button type="submit" class="reserve-button">予約する</button>
              </form>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
<script src="{{ asset('js/reserve.js') }}"></script>