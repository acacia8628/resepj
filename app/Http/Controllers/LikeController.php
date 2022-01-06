<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $userId = Auth::id();
            $shopId = $request->input('shopId');

            $insert = Like::create([
                'user_id' => $userId,
                'shop_id' => $shopId,
            ]);
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $userId = Auth::id();
            $shopId = $id;

            $item = Like::where('user_id',$userId)->where('shop_id',$shopId)->first();
            $item->delete();
            return redirect('/');
        }
    }
}
