<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Shop;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->input('shop_id');
        $score = $request->input('score');
        $comment = $request->input('comment');

        $items = Review::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'score' => $score,
            'comment' => $comment,
        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        $user_id = Auth::id();

        $shop = Shop::with(['reviews'])->where('id',$id)->first();
        $user_review = Review::where('user_id',$user_id)
            ->where('shop_id',$id)
            ->first();
        $reviews = Review::with(['shop'])
            ->where('shop_id',$id)
            ->orderBy('created_at','desc')
            ->paginate(20);

        $items = [
            'shop' => $shop,
            'user_review' => $user_review,
            'reviews' => $reviews,
        ];
        return view('review', $items);
    }

    public function update(ReviewRequest $request, $id)
    {
        if(Auth::check()){
            $user_id = Auth::id();
            $review_id = $id;
            $score = $request->input('score');
            $comment = $request->input('comment');

            $item = Review::where('id',$review_id)->where('user_id',$user_id)->first();

            $item->score = $score;
            $item->comment = $comment;
            $item->save();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
