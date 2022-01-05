<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
