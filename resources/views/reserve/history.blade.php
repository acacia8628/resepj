<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/reserve/history.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
            <div class="reserves-box">
                <h2 class="reserves-ttl">予約履歴</h2>
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
                    <div class="reserve-links">
                        <div class="reserve-link">
                            <a class="reserve-again-link" href="{{ route('shop.show', $reserve->shop->id) }}">もう一度予約する</a>
                        </div>
                        <div class="reserve-link">
                            <a class="review-link" href="{{ route('reviews.show', $reserve->shop->id) }}">お店のレビューをする</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>