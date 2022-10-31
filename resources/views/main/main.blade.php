@extends('welcome')
@section('title', 'Главная страница')
@section('content')
    <style>
        .main-grid{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        .bg-schedule{
            -webkit-box-shadow: 0px 0px 20px 14px rgba(34, 60, 80, 0.11);
            -moz-box-shadow: 0px 0px 20px 14px rgba(34, 60, 80, 0.11);
            box-shadow: 0px 0px 20px 14px rgba(34, 60, 80, 0.11);
            border-radius: 14px;
            padding: 14px;
        }
    </style>
    <div class="container pt-4">
        <h1 class="text-center p-5">Расписание</h1>
        <div class="main-grid mx-auto">
            @foreach($groups as $group)
            <div class="bg-schedule">
                    <h5 class="card-title text-center">{{$group->name}}</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Предмет</th>
                        <th scope="col">Преподователь</th>
                        <th scope="col">Кабинет</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach($pairs as $pair)
                    @if($pair->group_id == $group->id)
                    <tr>
                        <th scope="row">{{$pair->number}}</th>
                        <td>{{$pair->subject()}}</td>
                        <td>{{$pair->teacher()}}</td>
                        <td>{{$pair->cabinets()}}</td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
@endsection
