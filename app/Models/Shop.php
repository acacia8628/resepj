<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = [
        'genre_id',
        'area_id',
        'name',
        'overview',
        'img_url'
    ];

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array();

        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_reviewed_by_auth_user()
    {
        $id = Auth::id();
        $reviews = array();

        foreach($this->reviews as $review) {
            array_push($reviews, $review->user_id);
        }

        if (in_array($id, $reviews)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_reserved_by_auth_user()
    {
        $id = Auth::id();
        $reserves = array();
        $current_date = Carbon::now()->format('Y-m-d');

        foreach($this->reserves as $reserve) {
            if ($reserve->user_id == $id && $reserve->reserve_date < $current_date) {
                array_push($reserves, $reserve->user_id);
            }
        }

        if (in_array($id, $reserves)) {
            return true;
        } else {
            return false;
        }
    }

    public function score_avg_percentage()
    {
        $shop_id = $this->id;
        $reviews_shop_id = array();
        $reviews_score = array();

        /* 対象shopのリレーション先であるreviewsテーブルの
        「shop_id配列」と「score配列」を作成 */
        foreach($this->reviews as $review) {
            array_push($reviews_shop_id, $review->shop_id);
            array_push($reviews_score, $review->score);
        }

        /* 対象shopがレビューされていた場合、「score配列」の平均を出す
        「*20」は5段階評価をパーセンテージに変換するため（$average:5 = x:100） */
        if (in_array($shop_id, $reviews_shop_id)){
            $score_sum = array_sum($reviews_score);
            $average = $score_sum/count($reviews_score);

            return $average*20;
        } else {
            return 0;
        }
    }

    public function score_avg()
    {
        $shop_id = $this->id;
        $reviews_shop_id = array();
        $reviews_score = array();

        foreach($this->reviews as $review) {
            array_push($reviews_shop_id, $review->shop_id);
            array_push($reviews_score, $review->score);
        }

        if (in_array($shop_id, $reviews_shop_id)){
            $score_sum = array_sum($reviews_score);
            $average = $score_sum/count($reviews_score);

            return number_format($average, 1);
        } else {
            return number_format(0, 1);
        }
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
