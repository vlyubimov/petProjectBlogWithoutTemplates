@extends('layout.main')
@section('title')
    <title>Регистрация</title>
@endsection
@section('content')


<h1>Регистрация</h1>
<a href="/" class="back-button">На главную</a>
<form method="POST" action="/register" class="article-form">
    @csrf

    <label for="name" >Имя</label>
    <input id="name" type="text" value="{{ old('name') }}" name="name">
    @error('name')
        <div class="error-mess">{{ $message }}</div>
    @enderror

    <label for="email" >Email</label>
    <input id="email" type="email" value="{{ old('email') }}" name="email">
    @error('email')
        <div class="error-mess">{{ $message }}</div>
    @enderror

    <label for="password" >Пароль</label>
    <input id="password" type="password" value="{{ old('password') }}" name="password">
    @error('password')
        <div class="error-mess">{{ $message }}</div>
    @enderror

    <label for="password-confirm" >Повторите пароль</label>
    <input id="password-confirm" type="password" value="{{ old('password_confirmation') }}" name="password_confirmation">
    @error('password-confirm')
    <div class="error-mess">{{ $message }}</div>
    @enderror

    <input type="submit" value="Зарегистрироваться" style="width: 170px"/>
</form>

@endsection
