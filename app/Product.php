<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','image',
    ];
    public function category($value='')
    {
    	return $this->belongsTo('App\Category');
    }
}
