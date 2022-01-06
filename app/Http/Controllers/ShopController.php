<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shop'+$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
