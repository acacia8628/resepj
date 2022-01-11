<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shopname = $request->input('shopname');
        $area_id = $request->input('area');
        $genre_id = $request->input('genre');

        $query = Shop::query();

        if(!empty($shopname)){
            $query->where('name', 'like', '%'.$shopname.'%');
        }
        if(!empty($area_id)){
            $query->where('area_id', $area_id);
        }
        if(!empty($genre_id)){
            $query->where('genre_id', $genre_id);
        }

        $shops = $query->with(["area","genre","likes"])->paginate(12);
        $genres = Genre::all();
        $areas = Area::all();

        $items = [
            'shops' => $shops,
            'genres' => $genres,
            'areas' => $areas,
            'shopname' => $shopname,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
        ];
        return view('index', $items);
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('detail',['shop' => $shop]);
    }
}