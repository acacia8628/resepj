<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShopRegisterRequest;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;

class AdminShopController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        $areas = Area::all();

        $items = [
            'genres' => $genres,
            'areas' => $areas,
        ];
        return view('admin.shop_register', $items);
    }

    public function store(ShopRegisterRequest $request)
    {
        $genre_id = $request->input('genre');
        $area_id = $request->input('area');
        $name = $request->input('shop_name');

        Shop::create([
            'genre_id' => $genre_id,
            'area_id' => $area_id,
            'name' => $name,
            'overview' => 'お店の概要を変更してください。',
            'img_path' => 'お店のイメージ画像を設定してください。',
        ]);
        return redirect('admin');
    }
}
