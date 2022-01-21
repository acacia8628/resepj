<div>shop_register.blade.php</div>
<form method="POST" action="{{ route('adminShops.store') }}" class="form">
            @csrf
            <div class="form-ttl">Shop Registration</div>

            <select id="area" name="area" class="search__area">
                <option value="">All area</option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}">
                        {{$area->name}}
                    </option>
                @endforeach
            </select>
            <select id="genre" name="genre" class="search__genre">
                <option value="">All genre</option>
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">
                        {{$genre->name}}
                    </option>
                @endforeach
            </select>
            <!-- Name -->
            <div class="item-container">
                
                <span class="input-box">
                    <x-input id="shopname" class="input"
                            type="text"
                            name="shopname"
                            :value="old('shopname')"
                            placeholder="shopname"
                            autofocus />
                </span>
            </div>
            @if($errors->has('name'))
            <div class="error">
                *{{$errors->first('name')}}
            </div>
            @endif

            <div class="item-container">
                <x-button class="button">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>

<style>
  .icon{
    width: 25px;
    height: 25px;
  }
</style>