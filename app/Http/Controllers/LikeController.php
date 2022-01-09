<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $user_id = Auth::id();
            $shop_id = $request->input('shop_id');

            $items = Like::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
            ]);
            return redirect()->back();
        } else {
            return view('login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $user_id = Auth::id();
            $shop_id = $id;

            $item = Like::where('user_id',$user_id)->where('shop_id',$shop_id)->first();
            $item->delete();
            return redirect()->back();
        }
    }
}
