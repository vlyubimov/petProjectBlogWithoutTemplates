@extends('layout/main')
@section('title')
    <title>Изменение статьи</title>
@endsection
@section('content')

    <h1>Изменение статьи</h1>
    <a href="/" class="back-button">На главную</a>
    {!! Form::open(['class' => 'article-form', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    {{ Form::label('title', 'Название статьи') }}
    {{ Form::text('title', $article->title, ['placeholder' => 'введите название статьи']) }}
    @error('title')
    <div class="error-mess">{{ $message }}</div>
    @enderror

    {{ Form::label('anons', 'Название статьи') }}
    {{ Form::textarea('anons', $article->anons, ['placeholder' => 'введите анонс статьи']) }}
    @error('anons')
    <div class="error-mess">{{ $message }}</div>
    @enderror

    <img src="/storage/img/articles/{{$article->image}}" alt=""><br><br>
    <button onclick="show()" type="button">изменить</button><br><br>

    <div class="edit-foto" style="display: none">
        {{ Form::label('main_image', 'Фото статьи') }}
        {{ Form::file("/storage/img/articles/$article->image") }}
        <button onclick="cancel()" type="button">отменить</button>
    </div>
    <script>
        function show(){
            $('.edit-foto').show()
        }

        function cancel(){
            $('.edit-foto').hide()
        }
    </script>

    {{ Form::label('text', 'Название статьи') }}
    {{ Form::textarea('text', $article->text, ['placeholder' => 'введите текст статьи', 'id' => 'editor']) }}
    @error('text')
    <div class="error-mess">{{ $message }}</div>
    @enderror

    {{ Form::submit('Изменить'), ['class' => 'add-buttom'] }}
    {!! Form::close() !!}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) );
    </script>

    <script>

    </script>
@endsection
