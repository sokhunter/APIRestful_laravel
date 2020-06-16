<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $buyers = $category->products()
                            ->whereHas('transactions') // Obtiene solo los productos que tienen una transaccion
                            ->with('transactions.buyer') // obtener compradores de esas transacciones
                            ->get()
                            ->pluck('transactions')
                            ->collapse()
                            ->pluck('buyer')
                            ->unique() // Unique y values siempre van juntos
                            ->values();
        return $this->showAll($buyers);
    }
}
