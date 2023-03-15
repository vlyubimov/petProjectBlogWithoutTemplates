@extends('layout/main')
@section('title')
    <title>Добавиление статьи</title>
@endsection
@section('content')

    <h1>Добавиление статьи</h1>
    <a href="/" class="back-button">На главную</a>
    {!! Form::open(['class' => 'article-form', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title', '', ['placeholder' => 'введите название статьи']) }}
        @error('title')
        <div class="error-mess">{{ $message }}</div>
        @enderror

        {{ Form::label('anons', 'Название статьи') }}
        {{ Form::textarea('anons', '', ['placeholder' => 'введите анонс статьи']) }}
        @error('anons')
        <div class="error-mess">{{ $message }}</div>
        @enderror

        {{ Form::label('main_image', 'Фото статьи') }}
        {{ Form::file('main_image') }}

        {{ Form::label('text', 'Название статьи') }}
        {{ Form::textarea('text', '', ['placeholder' => 'введите текст статьи', 'id' => 'editor']) }}
        @error('text')
        <div class="error-mess">{{ $message }}</div>
        @enderror

        {{ Form::submit('Добавить'), ['class' => 'add-buttom'] }}
    {!! Form::close() !!}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) );
    </script>
@endsection
