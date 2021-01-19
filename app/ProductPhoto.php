<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = ['image'];
    //Ligação -> pertence a produtos

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
