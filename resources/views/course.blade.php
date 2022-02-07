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
              <div class="course">
                <div class="course-ttl">
                  <div class="course-ttl__ttl-box">
                    <button type="button" onClick="history.back()" class="course-ttl__back">
                      <
                    </button>
                    <h2 class="course-ttl__ttl">{{$course->name}}</h2>
                  </div>
                </div>
                <div class="course-overview">{{$course->overview}}</div>
                <img src="{{ asset('storage/'.$course->course_img_path) }}" class="course-img">
                <div class="course-price">{{$course->price}}円</div>
                <div class="course-detail">{{$course->course_detail}}</div>
              </div>

              <form method="POST" action="{{ route('reserves.store') }}" id="setup-form" class="reserve">
                @csrf
                <h2 class="reserve-ttl">予約</h2>
                <input type="hidden" name="course_id" value="{{$course->id}}">
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
                        <div id="course_check">{{$course->name}}</div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Price</th>
                      <td class="td">
                        <div id="price_check">{{$course->price}}円</div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="select-payment">
                  <label class="radio-label">
                    <input id="payment_shop"
                      class="payment-check"
                      type="radio"
                      name="payment_check"
                      value="payment_shop"
                      onclick="formSwitch()" checked
                      >お店で支払う
                  </label>
                  <label class="radio-label">
                    <input id="payment_credit"
                      class="payment-check"
                      type="radio"
                      name="payment_check"
                      value="payment_credit"
                      onclick="formSwitch()"
                      >クレジットカードで支払う
                  </label>
                  <div id="credit_input">
                    <input type="hidden" id="price" name="price" value="">
                    <input id="card_holder_name" type="text" placeholder="カード名義人" name="card_holder_name">
                    <div id="card_element"></div>
                  </div>
                </div>
                <button type="submit" id="reserve_btn" class="reserve-button">予約する</button>
              </form>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
<script>
  const price = {{$course->price}};
</script>
<script src="{{ asset('js/reserveWithCourse.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripeProcess.js') }}"></script>
<script src="{{ asset('js/hideInputCredit.js') }}"></script>