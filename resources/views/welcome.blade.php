@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Laravel 10 + Bootstrap 5 + SQLite</h1>
        </div>
        <div class="card-body">
            <p>Проект настроен только с CSS, JS и Bootstrap!</p>
            <button class="btn btn-success">Пример кнопки Bootstrap</button>
        </div>
    </div>
@endsection
