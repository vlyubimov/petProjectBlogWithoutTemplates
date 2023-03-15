@extends('layout/main')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
    <div class="block">

        @if(count($params)>0)
            @foreach($params as $el)
                <div class="news container">
                    <h2>{{$el[0]}}</h2>
                    <img src="{{$el[1]}}}">
                    <p>{{$el[2]}}</p>
                    <button class="btn"><a href="#">Подробнее...</a></button>
                </div>
            @endforeach
        @endif
    </div>
@endsection
