<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()
                        ->with('product.seller')
                        ->get()
                        ->pluck('product.seller') //obtiene solo el dato espesificado
                        ->unique('id') // los elementos duplicados por "id" se quedan como arrays vacios
                        ->values(); // ordena los indices y elimina los vacios
        return $this->showAll($sellers);
    }

}
