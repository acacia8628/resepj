<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Reserve;

class ManagerReserveController extends Controller
{
    public function show($id)
    {
        $reserves = Reserve::where('shop_id', $id)->get();
        return view('manager.reserve', ['reserves' => $reserves]);
    }
}
