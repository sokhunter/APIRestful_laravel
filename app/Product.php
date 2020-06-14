<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	const PRODUCTO_DISPONIBLE = 'disponible';
	const PRODUCTO_NO_DISPONIBLE = 'no disponible';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id' // Pertenece a => belongs to
    ];
    
    public function estaDisponible()
    {
    	return $this->status == Product::PRODUCT_DISPONIBLE;
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
