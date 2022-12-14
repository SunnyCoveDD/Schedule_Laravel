@extends('users.admin')
@section('title', 'Расписание')
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
    <div class="container pt-1">
        <h3 class="text-center pb-3">Расписание</h3>
        <form action="" method="post" class="mb-5 row d-flex justify-content-center">
            @csrf
            <div class="mb-3 col-6">
                <select id="group_name" onchange="this.form.submit()" name="group_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                    <option selected>Выберите группу</option>
                    @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
                @error('group_id')
                <div id="invalidName" class="invalid-feedback">Вы не выбрали группу</div>
                @enderror
            </div>
        </form>
        <div class="main-grid mx-auto">
            @foreach($groups as $group)
                @if($group->id == $group_sel)
                    <div class="bg-schedule">
                        <h5 class="card-title text-center">{{$group->name}}</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Предмет</th>
                                <th scope="col">Преподователь</th>
                                <th scope="col">Кабинет</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach($pairs as $pair)
                                @if($pair->group_id == $group->id)
                                    <tr>
                                        <th scope="row">{{$pair->number}}</th>
                                        <td class="text-center">{{date('j F', strtotime($pair->date_id))}}</td>
                                        <td class="text-center">{{$pair->subject()}}</td>
                                        <td class="text-center">{{$pair->teacher()}}</td>
                                        <td class="text-center">{{$pair->cabinets()}}</td>
                                        <td><a class="link-secondary text-decoration-none" href="{{route('edit_pair', $pair->id)}}">Изменить</a></td>
                                        <td><a class="link-secondary text-decoration-none" href="{{route('delete_pair', $pair->id)}}">Удалить</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
