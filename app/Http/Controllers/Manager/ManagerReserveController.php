<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Shop;
use Carbon\Carbon;

class ManagerReserveController extends Controller
{
    public function show($id)
    {
        $shop = Shop::find($id);
        $current_date = Carbon::now()->format('Y-m-d');

        $reserves = Reserve::where('shop_id', $id)
            ->whereDate('reserve_date', '>', $current_date)
            ->get();

        $items = [
            'reserves' => $reserves,
            'shop' => $shop
        ];
        return view('manager.reserve', $items);
    }
}
