<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if(session()->has('cart')) {
            session()->push('cart', $product);
        } else {
            //não existe o sessao então crio Array e Dps a sessao
            $products[] = $product;
            session()->put('cart', $products);
        }

        flash('Produto Adiciona no carrinho')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);

    }

    public function remove($slug)
    {
        //Course M12/A8
        if(!session()->has('cart')){
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');

    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Desistência da compra realizada com sucesso!')->success();
        return redirect()->route('cart.index');

    }

    private function productIncrement($slug, $amount, $products)
    {
        //Course M12/A11 4:16
        $products = array_map(function($line) use($slug, $amount){
            if($slug == $line['slug']){
                $line['amount'] += $amount;

            }
            return $line;
        }, $products);

        return $products;

    }
}
