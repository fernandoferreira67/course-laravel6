<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;


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
        $products = $this->product->limit(8)->orderBy('id','DESC')->get();

        //Get products com order by
        //dd($products);
        //video-2-13:37
        return view('welcome', compact('products'));
    }
    public function single($slug)
    {
        /*
        *$product = $this->product->where('slug', $slug)->firts();
        *Desta forma comparo o where com campo e variavel vinda do request
        */

        //Method Slug AutO -> Eloquent já busca o campo slug no database
        $product = $this->product->whereSlug($slug)->first();

        return view('single', compact('product'));


    }
}
