@extends('welcome')
@section('title', 'Расписание')
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
                        <th scope="col">Изменение студенты</th>
                        <th scope="col">Удаление студента</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->login}}</td>
                            <td>{{$student->group()}}</td>
                            <td><a class="link-secondary text-decoration-none" href="#">Изменить заявку</a></td>
                            <td><a class="link-secondary text-decoration-none" href="#">Удалить заявку</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
