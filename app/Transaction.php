<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id'
    ];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
