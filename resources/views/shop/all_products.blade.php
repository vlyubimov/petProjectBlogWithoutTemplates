@extends('layout/main')
@section('title')
    <title>Магазин</title>
@endsection
@section('content')

    <div class="block">

        @foreach($products as $el)
            <div class="news container">
                <h2>{{$el->product_name}}</h2>
                <p>{{{$el->product_anons}}}</p><br>
                <p>{{{$el->product_price}}}$</p>
                <button class="btn"><a href="/public/shop/{{$el->id}}">Детальнее</a></button>
            </div>

        @endforeach

    </div>
@endsection
