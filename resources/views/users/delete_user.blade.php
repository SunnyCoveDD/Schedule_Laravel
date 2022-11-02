@extends('users.admin')
@section('title', 'Удаление')
@section('content')
    <div class="container p-4">
        @if(session()->has('errorDelete'))
            <div class="text-center alert alert-danger ms-5 me-5">{{session()->get('errorDelete')}}</div>
        @endif
        <div class="row d-grid justify-content-center">
            <div class="col">
            </div>
            <div class="col-m6">
                <h2 class="pt-5 pb-5">Удаление пользователя</h2>
                <p>Имя пользователя - {{$user->name}}</p>
                <p class="text text-danger">Вы точно хотите удалить пользователя?</p>
                <form method="post">
                    @csrf
                    <a class="link-secondary text-decoration-none" href="{{route('admin')}}">Отмена операции</a>
                    <button type="submit" class="btn btn-danger ms-3">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
