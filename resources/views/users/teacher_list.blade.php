@extends('users.admin')
@section('title', 'Преподаватели')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col"></div>
            <div class="dol-12">
                <h4 class="text-center pb-5">Преподаватели</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Преподаватель</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Роль преподавателя</th>
                        <th scope="col">Изменение преподавателя</th>
                        <th scope="col">Удаление преподавателя</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->login}}</td>
                            <td>{{$teacher->role()}}</td>
                            <td><a class="link-secondary text-decoration-none" href="{{route('edit_user', $teacher->id)}}">Изменить</a></td>
                            <td><a class="link-secondary text-decoration-none" href="{{route('delete_user', $teacher->id)}}">Удалить</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
