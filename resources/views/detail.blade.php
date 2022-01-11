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
                <div class="reserve-input-box">
                  <input type="date" name="r_date"
                            id="r_date"
                            onchange="inputDate()"
                            class="reserve-input">
                </div>
                <div class="reserve-input-box">
                  <select name="r_time" onchange="inputTime(this);" class="reserve-input__time">
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                  </select>
                </div>
                <div class="reserve-input-box">
                  <select name="r_number" onchange="inputNumber(this);" class="reserve-input__number">
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                    <option value="10">10人</option>
                  </select>
                </div>
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