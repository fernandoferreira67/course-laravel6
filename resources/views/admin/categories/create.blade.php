@extends('layouts.app')

@section('content')
    <h1>Criar Categoria</h1>

    <form action="{{route('admin.categories.store')}}" method="post">
       @csrf

        <div class="form-group">
            <label>Nome da Categoria</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{old('description')}}">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Categoria</button>
        </div>

    </form>
@endsection
