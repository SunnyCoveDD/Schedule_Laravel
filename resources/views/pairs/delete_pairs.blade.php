@extends('users.admin')
@section('title', 'Удаление')
@section('content')
    <div class="container p-4">
        <div class="row d-grid justify-content-center">
            <div class="col"></div>
            <div class="col-m6">
                <h2 class="pt-5 pb-5">Удаление пары</h2>
                <p>Номер пары - {{$pairs->number}}</p>
                <p>Пара - {{$pairs->subject()}}</p>
                <p>Преподаватель - {{$pairs->teacher()}}</p>
                <p>Кабинет - {{$pairs->cabinets()}}</p>
                <p class="text text-danger">Вы точно хотите удалить пару?</p>
                <form method="post">
                    @csrf
                    <a class="link-secondary text-decoration-none" href="#">Отмена операции</a>
                    <button type="submit" class="btn btn-danger ms-3">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
