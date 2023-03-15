@extends('layout/main')
@section('title')
    <title>Магазин</title>
@endsection
@section('content')

    <div class="block">


            <div class="news container">
                <h2>{{$product->product_name}}</h2>
                <p>{{{$product->product_anons}}}</p><br>
                <p>{{{$product->product_price}}}$</p>
                <button class="btn"><a href="/public/shop/{{$product->id}}">Купить</a></button>
            </div>



    </div>
@endsection
