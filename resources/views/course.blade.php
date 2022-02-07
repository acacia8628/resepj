<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/course.css') }}">
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
                    <h2 class="detail-ttl__ttl">{{$course->name}}</h2>
                  </div>
                </div>
                <div class="detail-overview">{{$course->overview}}</div>
                <img src="{{ asset('storage/'.$course->course_img_path) }}" class="detail-img">
                <div>{{$course->price}}円</div>
                <div>{{$course->course_detail}}</div>
              </div>

              <form method="POST" action="{{ route('reserves.store') }}" class="reserve">
                @csrf
                <h2 class="reserve-ttl">予約</h2>
                <input type="hidden" name="shop_id" value="{{$course->shop->id}}">
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
                      <td class="td">{{$course->shop->name}}</td>
                    </tr>
                    <tr>
                      <th class="th">Date</th>
                      <td class="td">
                        <div id="date_check">{{ \Carbon\Carbon::now()->format("Y/m/d") }}</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Time</th>
                      <td class="td">
                        <div id="time_check">17:00</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Number</th>
                      <td class="td">
                        <div id="number_check">1人</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Course</th>
                      <td class="td">
                        <div id="price_check">{{$course->name}}</div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div>
                  <label>
                    <input class="js-check" type="radio" name="rs" value="payment_store" onclick="formSwitch()" >お店で支払う
                  </label>
                  <label>
                    <input class="js-check" type="radio" name="rs" value="payment_credit" onclick="formSwitch()">クレジットカードで支払う
                  </label>
                  <!-- <div id="sample" class="">
                    <input id="card-holder-name" type="text" placeholder="カード名義人" name="card-holder-name">
                    <div id="card-element"></div>
                  </div> -->
                </div>
                <button type="submit" class="reserve-button">予約する</button>
              </form>
              <div class="p-6 bg-white border-b border-gray-200">
              <h2>購入</h2>
              <form id="setup-form" action="{{ route('purchase.post') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="{{$course->price}}">
                <input type="hidden" name="course_id" valie="{{$course->id}}">
                <input id="card-holder-name" type="text" placeholder="カード名義人" name="card-holder-name">
                <div id="card-element"></div>
                <button id="card-button">
                  購入
                </button>
              </form>
            </div>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
<script src="{{ asset('js/reserve.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripeProcess.js') }}"></script>
<script src="{{ asset('js/hideInputCredit.js') }}"></script>