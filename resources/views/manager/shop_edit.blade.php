<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/manager/edit.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-manager-header/>
            </header>
        </x-slot>

        <div class="content">
          <h2 class="ttl">店舗情報編集</h2>

          <div class="shop-container">
            <form method="POST" action="{{ route('managerShops.update', $shop->id) }}" enctype="multipart/form-data" class="reserve">
              @method('PATCH')
              @csrf
              <div class="item-container">
                <p class="label">店舗名</p>
                <input type="text" name="shop_name" value="{{$shop->name}}" class="input">
              </div>
              @if($errors->has('shop_name'))
              <div class="error">
                *{{$errors->first('shop_name')}}
              </div>
              @endif

              <div class="item-container">
                <p class="label">ジャンル</p>
                <select name="genre_id" class="select">
                @foreach($genres as $genre)
                  @if($shop->genre_id == $genre->id)
                    <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                  @else
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endif
                @endforeach
                </select>
              </div>
              @if($errors->has('genre_id'))
              <div class="error">
                *{{$errors->first('genre_id')}}
              </div>
              @endif

              <div class="item-container">
                <p class="label">エリア</p>
                <select name="area_id" class="select">
                @foreach($areas as $area)
                  @if($shop->area_id == $area->id)
                    <option value="{{$area->id}}" selected>{{$area->name}}</option>
                  @else
                    <option value="{{$area->id}}">{{$area->name}}</option>
                  @endif
                @endforeach
                </select>
              </div>
              @if($errors->has('area_id'))
              <div class="error">
                *{{$errors->first('area_id')}}
              </div>
              @endif

              <div class="item-container">
                <p class="label">概要</p>
                <textarea id="overview"
                    name="overview"
                    rows="5"
                    cols="40"
                    class="overview">{{$shop->overview}}</textarea>
              </div>
              @if($errors->has('overview'))
              <div class="error">
                *{{$errors->first('overview')}}
              </div>
              @endif

              <div class="item-container">
                <p class="label">現在の画像</p>
                <img src="{{ asset('storage/'.$shop->img_path) }}" class="img">
              </div>
              <div class="item-container">
                <p class="label">変更したい画像を選択</p>
                <input type="file" name="img_file" value="" accept='image/*' onchange="previewImage(this);">
              </div>
              @if($errors->has('img_file'))
              <div class="error">
                *{{$errors->first('img_file')}}
              </div>
              @endif
              <div class="item-container">
                <p class="label">プレビュー</p>
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:400px;">
              </div>

              <div class="item-container">
                <p class="label">公開設定</p>
                <input type="radio" id="public_0" name="public" @if($shop->public == 0) checked @endif value="0">
                <label for="public_0">
                  店舗を非公開にする
                </label>
                <input type="radio" id="public_1" name="public" @if($shop->public == 1) checked @endif value="1">
                <label for="public_1">
                  店舗を公開する
                </label>
              </div>
              @if($errors->has('area_id'))
              <div class="error">
                *{{$errors->first('area_id')}}
              </div>
              @endif
              <button type="submit" class="button">変更する</button>
            </form>
            <button type="button" onClick="history.back()">戻る</button>
          </div>
        </div>
    </x-auth-card>
</x-guest-layout>
<script src="{{ asset('js/inputFile.js') }}"></script>