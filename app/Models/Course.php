<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'overview',
        'price',
        'course_detail',
        'course_img_path',
    ];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function reserves()
    {
        return $this->belongsToMany('App\Models\Reserve');
    }
}
