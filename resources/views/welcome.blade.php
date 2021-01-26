@extends('layouts.front')


@section('content')
    @foreach ($products as $product)
        <div class="card" style="width: 18rem;">
            @if($product->photos->count())
                <img src="{{$product->photos->first()->image}}" class="card-img-top" alt="...">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>

        </div>
    @endforeach
@endsection
