<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;

class ManagerShopController extends Controller
{
    public function edit($id)
    {
        $shop = Shop::find($id);
        $genres = Genre::all();
        $areas = Area::all();

        $items = [
            'shop' => $shop,
            'genres' => $genres,
            'areas' => $areas,
        ];
        return view('manager.shop_edit', $items);
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $genre_id = $request->input('genre');
        $area_id = $request->input('area');
        $name = $request->input('shopname');
        $overview = $request->input('overview');
        $img_url = $request->input('img_url');

        Shop::where('user_id', $user_id)
            ->update([
                'genre_id' => $genre_id,
                'area_id' => $area_id,
                'name' => $name,
                'overview' => $overview,
                'img_url' => $img_url,
            ]);
        return redirect('manager');
    }
}
