<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'description'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    
}
