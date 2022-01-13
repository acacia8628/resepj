<x-guest-layout>
    <x-slot name="style">
      <link rel="stylesheet" href="{{ asset('css/reserve_edit.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
            <div class="content">
              <form method="POST" action="{{ route('reserves.update', $reserve->id) }}" class="reserve">
                @method('PATCH')
                @csrf
                <h2 class="reserve-ttl">予約内容</h2>
                <input type="hidden" name="shop_id" value="{{$reserve->shop->id}}">
                @if($errors->has('shop_id'))
                <div class="error">
                  *{{$errors->first('shop_id')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <input type="date" name="r_date"
                            id="r_date"
                            onchange="inputDate()"
                            class="reserve-input"
                            value="{{$reserve->reserve_date}}">
                </div>
                @if($errors->has('r_date'))
                <div class="error">
                  *{{$errors->first('r_date')}}
                </div>
                @endif

                <div class="reserve-input-box">
                  <select name="r_time" onchange="inputTime(this);" class="reserve-input__time">
                  @foreach($times as $time)
                    @if($reserve->reserve_time == $time)
                      <option value="{{$time}}" selected>{{substr($time, 0, 5)}}</option>
                    @else
                      <option value="{{$time}}">{{substr($time, 0, 5)}}</option>
                    @endif
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
                    @if($reserve->reserve_number == $number)
                      <option value="{{$number}}" selected>{{$number}}人</option>
                    @else
                      <option value="{{$number}}">{{$number}}人</option>
                    @endif
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
                      <td class="td">{{$reserve->shop->name}}</td>
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
                <button type="submit" class="reserve-button">変更する</button>
              </form>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
<script src="{{ asset('js/reserve.js') }}"></script>