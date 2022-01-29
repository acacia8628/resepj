<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Shop;

class ManagerReserveController extends Controller
{
    public function show($id)
    {
        $shop = Shop::find($id);

        $reserves = Reserve::with(['user'])
            ->where('shop_id', $id)
            ->where('status', 'reserved')
            ->orderBy('reserve_date', 'asc')
            ->orderBy('reserve_time', 'asc')
            ->simplePaginate(10);

        $items = [
            'reserves' => $reserves,
            'shop' => $shop
        ];
        return view('manager.reserve', $items);
    }
}
