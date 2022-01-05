<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
                <form method="GET" action="{{ route('shop.index') }}" class="search-form">
                    @csrf
                    <select id="area" class="search__area">
                        <option value="">
                            All area<span><img src="/image/list.png"></span>
                        </option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}" id="{{$area->id}}">
                                {{$area->name}}
                            </option>
                        @endforeach
                    </select>
                    <select id="genre" class="search__genre">
                        <option value="">
                            All genre<span><img src="/image/list.png"></span>
                        </option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}" id="{{$genre->id}}">
                                {{$genre->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="search__shopname">
                        <x-input id="shopname" class="input"
                                    type="text"
                                    name="shopname"
                                    placeholder=""></x-input>
                    </div>
                </form>
            </header>
            <div class="wrapper">
                    @foreach($shops as $shop)
                        <div class="card">
                            <div class="card__content-img">
                                <img class="card__img" src="{{$shop->img_url}}"/>
                            </div>
                            <div class="card__text-box">
                                <h2 class="card__name">{{$shop->name}}</h2>
                                <p class="card__area">#{{$shop->area_id}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>

<style>
    .header{
        display: flex;
        justify-content: space-between;
        padding: 30px 5% 10px;
    }
    .search-form{
        display: flex;
    }
    .input{
        width: 100%;
        font-size: 100%;
        border: none;
        border-bottom: 1px solid #000;
        box-sizing: border-box;
        outline: none;
    }
    .wrapper{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        width: 90%;
        margin: 30px auto;
    }
    .card {
        width: 24%;
        cursor: pointer;
        border-radius: 3px;
        box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
        margin-bottom: 30px;
    }
    .card__text-box {
        padding: 15px;
    }
    .card__content-img {
        text-align: center;
    }
    .card__img {
        width: 100%;
        object-fit: cover;
        border-radius: 3px 3px 0 0;
    }
    .card__name{

    }
    .card__area{
        font-size: 10px;
        margin-top: 5px;
    }
</style>