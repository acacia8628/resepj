<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Manager\ShopEditRequest;
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

    public function update(ShopEditRequest $request, $id)
    {
        $user_id = Auth::id();
        $genre_id = $request->input('genre');
        $area_id = $request->input('area');
        $name = $request->input('shopname');
        $overview = $request->input('overview');

        if (!empty($request->file('imgfile'))) {
            $img_name = $request->file('imgfile')->getClientOriginalName();
            $img_path = $request->file('imgfile')->storeAs('shop_img', $img_name, 'public');

            Shop::where('user_id', $user_id)
                ->update([
                    'img_path' => $img_path,
                ]);
        }

        Shop::where('user_id', $user_id)
            ->update([
                'genre_id' => $genre_id,
                'area_id' => $area_id,
                'name' => $name,
                'overview' => $overview,
            ]);
        return redirect('manager');
    }
}
