<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Instancia methodo Storage
use Illuminate\Support\Facades\Storage;

//Import Model Product
use App\ProductPhoto;

class ProductPhotoController extends Controller
{


    public function removePhoto(Request $request)
    {
        $photoName = $request->get('photoName');
        //Remover Foto Storage usando Help Storage
        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }

        //Remover Image Database
        $removerPhoto = ProductPhoto::where('image', $photoName);
        $productId = $removerPhoto->first()->product_id;
        $removerPhoto->delete();

        flash('Imagem removida com sucesso!')->success();
        return redirect()->route('admin.products.edit',['product' => $productId]);

    }
}
