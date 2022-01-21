<button type="button" onClick="history.back()">戻る</button>
<form method="POST" action="{{ route('managerShops.update', $shop->id) }}" class="reserve">
  @method('PATCH')
  @csrf
  <h2 class="reserve-ttl">shop edit</h2>
  <div>
  <input type="text" name="shopname" value="{{$shop->name}}">
  </div>
  @if($errors->has('shop_id'))
  <div class="error">
    *{{$errors->first('shop_id')}}
  </div>
  @endif

  <div class="">
    <select name="genre" class="">
    @foreach($genres as $genre)
      @if($shop->genre_id == $genre->id)
        <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
      @else
        <option value="{{$genre->id}}">{{$genre->name}}</option>
      @endif
    @endforeach
    </select>
  </div>

  <div class="">
    <select name="area" class="">
    @foreach($areas as $area)
      @if($shop->area_id == $area->id)
        <option value="{{$area->id}}" selected>{{$area->name}}</option>
      @else
        <option value="{{$area->id}}">{{$area->name}}</option>
      @endif
    @endforeach
    </select>
  </div>

  <div>
    <textarea id="overview"
        name="overview"
        rows="5"
        cols="40"
        class="">{{$shop->overview}}</textarea>
  </div>
  <div>
    <input type="text" name="img_url" value="{{$shop->img_url}}">
  </div>
  <button type="submit" class="reserve-button">変更する</button>
</form>