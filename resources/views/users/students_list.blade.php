@extends('users.admin')
@section('title', 'Студенты')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col"></div>
            <div class="dol-12">
                <h4 class="text-center pb-5">Студенты</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Студент</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Изменение студента</th>
                        <th scope="col">Удаление студента</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->login}}</td>
                            <td>{{$student->group()}}</td>
                            <td><a class="link-secondary text-decoration-none" href="{{route('edit_user', $student->id)}}">Изменить</a></td>
                            <td><a class="link-secondary text-decoration-none" href="{{route('delete_user', $student->id)}}">Удалить</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
