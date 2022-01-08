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
        $query = Shop::query();

        $shopname = $request->input('shopname');
        $area = $request->input('area');
        $genre = $request->input('genre');

        $query->join('areas',function($query)use($request){
            $query->on('shops.area_id','=','areas.id');
        });
        $query->join('genres',function($query)use($request){
            $query->on('shops.genre_id','=','genres.id');
        });

        if(!empty($shopname)){
            $query->where('shopname', 'like', '%'.$shopname.'%');
        }
        if(!empty($area)){
            $query->where('area', 'like', '%'.$area.'%');
        }
        if(!empty($genre)){
            $query->where('genre', 'like', '%'.$genre.'%');
        }

        $shops = Shop::with(["area","genre","likes"])->get();
        $genres = Genre::all();
        $areas = Area::all();

        $items = [
            'shops' => $shops,
            'genres' => $genres,
            'areas' => $areas
        ];
        return view('index', $items);
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('detail',['shop' => $shop]);
    }
}