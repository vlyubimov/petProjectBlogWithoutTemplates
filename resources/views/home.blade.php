@extends('layout.main')
@section('title')
    <title>Кабинет пользователя</title>
@endsection
@section('content')

<div class="block">
    <h1>Кабинет пользователя</h1>

    @if (session('status'))
        <div class="success-mess" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <p class="auth">Привет, {{ Auth::user()->name }}</p>
</div>

    @if(count($articles)>0)
        <div class="articles">
            @foreach($articles as $el)
                <div class="post">
                    <img src="/storage/img/articles/{{$el->image}}" alt="">
                    <h2>{{$el->title}}</h2>
                    <p>{{{$el->anons}}}</p>
                    <p><b>Автор: </b>{{$el->user->name}}</p>
                    <a href="/article/{{$el->id}}">Прочитать</a>
                </div>

            @endforeach
        </div>
    @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

    setTimeout(function () {
        $('.auth').hide()
    },2000)
</script>
@endsection



