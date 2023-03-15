@extends('layout/main')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
    <div class="block">
        <h1>Про нас</h1>
        @if(count($params)>0)
            <ul>
                @foreach($params as $p)
                    <li>{{$p}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
