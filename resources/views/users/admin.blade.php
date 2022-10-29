@extends('welcome')
@section('title', 'Панель администратора')
@section('content')
    <div class="container p-5">
        <h2 class="text-center p-4">Панель администратора</h2>
        <div class="row">
            <div class="col">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link link-dark" aria-current="page" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#">Студенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#">Преподаватели</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark">Расписание</a>
                    </li>
                </ul>
            </div>
            <div class="col-6">
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
