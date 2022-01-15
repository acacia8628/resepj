<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Review;

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

        $shops = $query->with(["area","genre","likes","reviews"])->paginate(12);
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
        $times = [
            '17:00:00',
            '17:30:00',
            '18:00:00',
            '18:30:00',
            '19:00:00',
            '19:30:00',
            '20:00:00',
            '20:30:00',
            '21:00:00',
            '21:30:00',
        ];
        $numbers = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10'
        ];
        $reviews = Review::where('shop_id',$id)
            ->orderBy('score','desc')
            ->limit(3)
            ->get();

        $items = [
            'shop' => $shop,
            'times' => $times,
            'numbers' => $numbers,
            'reviews' => $reviews,
        ];
        return view('detail',$items);
    }
}