@extends('layout/main')
@section('title')
    <title>{{$data['article']->title}}</title>
@endsection

@section('content')

    <h1>{{$data['article']->title}}/ Статья на Blog Spot</h1>
    <a href="/" class="back-button">На главную</a>
    <div class="articles one">
            <div class="post">
                <img src="/storage/img/articles/{{$data['article']->image}}" alt="">
                <h2>{{$data['article']->title}}</h2>
                <p>{{{$data['article']->anons}}}</p> <br>
                <p>{!! $data['article']->text !!}</p>
                <p><b>Автор: </b>{{$data['article']->user->name}}</p>


                @auth
                    @if(Auth::user()->id == $data['article']->user_id)
                        <a href="/article/{{$data['article']->id}}/edit">Изменить</a>

                        {!! Form::open(['method' => 'DELETE', 'action' => ['ArticlesController@destroy', $data['article']->id]]) !!}
                        {{ Form::submit('Удалить', ['class' => 'delete-button']) }}
                        {!! Form::close() !!}
                    @endif

                @endauth
            </div>

    </div>

    <h2 class="frame_comm">Комментарии:</h2>

    @foreach($data['comments'] as $el)

        <div class="comment">
            <span><b>{{{$el->user_name}}}</b></span>

            <span><small>{{{ \App\Http\Controllers\TimeDifferenceController::calculateDifference($el->created_at) }}}</small></span><br><br>

            <p>{{{$el->text_comment}}}</p>
        </div>

    @endforeach

    <div class="comments">



        <h1>Форма комментариев</h1>
        {!! Form::open(['class' => 'article-form', 'method' => 'POST', 'action' => ['CommentsController@store', $data['article']->id]]) !!}
        {{ Form::label('comment', 'Комментарий') }}
        {{ Form::textarea('comment', '', ['placeholder' => 'Ваш комментарий']) }}
        @error('comment')
        <div class="error-mess">{{ $message }}</div>
        @enderror
        {{ Form::submit('Добавить'), ['class' => 'add-buttom'] }}
        {!! Form::close() !!}
    </div>
@endsection
