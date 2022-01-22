<div>aaaaaaaaaa</div>
<div>{{$shop->name}}</div>
<form method="GET" action="{{ route('managerShops.edit', $shop->id) }}">
  @csrf
  <button>編集</button>
</form>
<form method="GET" action="{{ route('managerReserves.show', $shop->id) }}">
  @csrf
  <button>予約情報一覧</button>
</form>
<img src="{{ asset('storage/'.$shop->img_path) }}">
