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
                  <button type="button" onClick="history.back()" class="detail-ttl__back">
                    <
                  </button>
                  <h2 class="detail-ttl__ttl">{{$shop->name}}</h2>
                </div>
                <img src="{{$shop->img_url}}" class="detail-img">
                <div class="detail-hash">
                  <p class="detail-hash__area">#{{$shop->area->name}}</p>
                  <p class="detail-hash__genre">#{{$shop->genre->name}}</p>
                </div>
                <div class="detail-overview">
                  {{$shop->overview}}
                </div>
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
                            class="reserve-input">
                </div>
                @if($errors->has('r_date'))
                <div class="error">
                  *{{$errors->first('r_date')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <select name="r_time" onchange="inputTime(this);" class="reserve-input__time">
                  @foreach($times as $time)
                    <option value="{{$time}}">{{$time}}</option>
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
                  @foreach($numbers as $number)
                    <option value="{{$number}}">{{$number}}人</option>
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
                        <div id="date"></div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Time</th>
                      <td class="td">
                        <div id="time"></div>
                      </td>
                    </tr>
                    <tr>
                      <th class="th">Number</th>
                      <td class="td">
                        <div id="number"></div>
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