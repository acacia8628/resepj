<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
                <form method="GET" action="{{ route('shop.index') }}" class="search-form">
                    @csrf
                    <select id="area" class="search__area">
                        <option value="">All area</option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}" id="{{$area->id}}">
                                {{$area->name}}
                            </option>
                        @endforeach
                    </select>
                    <select id="genre" class="search__genre">
                        <option value="">All genre</option>
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
                                <div class="card__hash">
                                    <p class="card__hash--area">#{{$shop->area->name}}</p>
                                    <p class="card__hash--genre">#{{$shop->genre->name}}</p>
                                </div>
                                <div class="card__action">
                                    <form method="GET" action="{{ route('shop.show',$shop->id) }}">
                                        @csrf
                                        <button class="card__action--button">詳しく見る</button>
                                    </form>
                                    @if($shop->is_liked_by_auth_user())
                                    <form method="POST" action="{{ route('likes.destroy', $shop->id) }}" class="card__action--like-box">
                                        @csrf
                                        <img class="card__action--like" src="/image/heart2.png">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input class="card__action--like-input" type="submit" name="shopId">
                                    </form>
                                    @else
                                    <form method="POST" action="{{ route('likes.store') }}" class="card__action--like-box">
                                        @csrf
                                        <img class="card__action--like" src="/image/heart.png">
                                        <input class="card__action--like-input" type="submit" name="shopId" value="{{$shop->id}}">
                                    </form>
                                    @endif
                                </div>
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
    .card__hash{
        display: flex;
    }
    .card__hash--area,
    .card__hash--genre{
        font-size: 10px;
        margin: 5px 3px 0 0;
    }
    .card__action{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }
    .card__action--button{
        background-color: #305DFF;
        color: #fff;
        padding: 5px 10px;
        border-radius: 6px;
        display: block;
        font-size: 12px;
        border: none;
        cursor: pointer;
    }
    .card__action--like-box{
        position: relative;
    }
    .card__action--like{
        width: 25px;
        height: 25px;
    }
    .card__action--like-input{
        opacity: 0;
        position: absolute;
        cursor: pointer;
        width: 25px;
        height: 25px;
        top: 0;
        left: 0;
        z-index: 2;
    }
</style>