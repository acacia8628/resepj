<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
                <form method="GET" action="{{ route('shop.index') }}" class="search-form">
                    @csrf
                    <select id="area" name="area" class="search__area">
                        <option value="">All area</option>
                        @foreach($areas as $area)
                        @if($area->id == $area_id)
                            <option value="{{$area->id}}" selected>
                                {{$area->name}}
                            </option>
                        @else
                            <option value="{{$area->id}}">
                                {{$area->name}}
                            </option>
                        @endif
                        @endforeach
                    </select>
                    <select id="genre" name="genre" class="search__genre">
                        <option value="">All genre</option>
                        @foreach($genres as $genre)
                        @if($genre->id == $genre_id)
                            <option value="{{$genre->id}}" selected>
                                {{$genre->name}}
                            </option>
                        @else
                            <option value="{{$genre->id}}">
                                {{$genre->name}}
                            </option>
                        @endif
                        @endforeach
                    </select>
                    <div class="search__shopname">
                        <img src="/image/search.png" class="search-img">
                        <x-input id="shopname" class="input"
                                    type="text"
                                    name="shopname"
                                    placeholder="Search ..."
                                    value="{{$shopname}}"></x-input>
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
                                        <input class="card__action--like-input" type="submit" name="shop_id">
                                    </form>
                                    @else
                                    <form method="POST" action="{{ route('likes.store') }}" class="card__action--like-box">
                                        @csrf
                                        <img class="card__action--like" src="/image/heart.png">
                                        <input class="card__action--like-input" type="submit" name="shop_id" value="{{$shop->id}}">
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$shops->appends(request()->input())->links()}}
        </x-slot>
    </x-auth-card>
</x-guest-layout>