<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use Carbon\Carbon;

class ManagerReserveController extends Controller
{
    public function show($id)
    {
        $current_date = Carbon::now()->format('Y-m-d');

        $reserves = Reserve::where('shop_id', $id)
            ->whereDate('reserve_date', '>', $current_date)
            ->get();
        return view('manager.reserve', ['reserves' => $reserves]);
    }
}
