<x-guest-layout>
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

<style>
    .header{
      padding: 30px 5% 10px;
    }
    .content{
      display: flex;
      padding-bottom: 50px;
    }
    .detail{
      margin: 30px auto 0 5%;
      width: 42%;
    }
    .detail-ttl{
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .detail-ttl__back{
      padding: 5px 10px;
      background-color: #fff;
      border: none;
      border-radius: 3px;
      box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
      margin-right: 15px;
      cursor: pointer;
    }
    .detail-ttl__ttl{
      font-size: 32px;
    }
    .detail-img{
      width: 100%;
      margin-bottom: 30px;
    }
    .detail-hash{
      display: flex;
      margin-bottom: 30px;
    }
    .detail-hash__area,
    .detail-hash__genre{
      margin: 5px 3px 0 0;
    }
    .detail-overview{
      line-height: 1.4em;
    }
    .reserve{
      position: relative;
      background-color: #305dff;
      height: 80vh;
      width: 42%;
      margin: 0 5% 0 auto;
      border-radius: 5px;
      box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
    }
    .reserve-ttl{
      color: #fff;
      font-size: 24px;
      padding: 30px 20px;
    }
    .reserve-input-box{
      margin: 10px 20px;
    }
    .reserve-input,
    .reserve-input__time,
    .reserve-input__number{
      display: block;
      padding: 5px;
      border-radius: 5px;
      border: none;
    }
    .reserve-input__time,
    .reserve-input__number{
      width: 100%;
      box-sizing: border-box;
    }
    .check{
      margin: 30px 20px;
      padding: 20px;
      background-color: #4d7fff;
      border-radius: 5px;
    }
    .table{
      color: #fff;
    }
    .th,
    .td{
      padding: 5px;
      text-align: left;
      font-size: 14px;
    }
    .reserve-button{
      position: absolute;
      width: 100%;
      bottom: 0;
      border: none;
      border-radius: 0 0 5px 5px;
      background-color: #0538ff;
      color: #fff;
      font-size: 14px;
      padding: 20px;
      cursor: pointer;
    }
</style>