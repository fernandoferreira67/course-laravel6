<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;

    /*Construtor*/
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get products with limited 8
        //$products = $this->product->limit(8)->get();

        //Get products com order by
        //dd($products);
        //video-2-13:37
        return view('welcome', compact('products'));
    }
}
