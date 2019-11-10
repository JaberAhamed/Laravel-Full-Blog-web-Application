<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
     protected $fillable = [
        'user_id', 'category_id', 'title','image', 'Details',
    ];

     public function category()
    {
        return $this->belongsTo('App\Category');
    }
     public function user()
    {
        return $this->belongsTo('App\User');
    }

}
