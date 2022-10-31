@extends('welcome')
@section('title', 'Добавление расписания')
@section('content')
    <div class="container p-5">
        <h2 class="text-center p-4">Добавление расписания</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="number">Номер пары</label>
                        <select id="number" name="number" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите номер пары</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        @error('number')
                        <div id="invalidName" class="invalid-feedback">Вы не указали номер пары</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="group">Группа</label>
                        <select id="group" name="group_id" class="form-select @error('group_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите группу</option>
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали пары</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="subject">Предмет</label>
                        <select id="subject" name="subject_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите предмет</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали предмет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="user">Преподаватель</label>
                        <select id="user" name="user_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите преподавателя</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали преподавателя</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="cabinet">Кабинет</label>
                        <select id="cabinet" name="cabinet_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите кабинет</option>
                            @foreach($cabinets as $cabinet)
                                <option value="{{$cabinet->id}}">{{$cabinet->number}}</option>
                            @endforeach
                        </select>
                        @error('cabinet_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали кабинет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="date">Дата</label>
                        <input type='date' class="form-control @error('date_id') is-invalid @enderror" id="date" name="date_id">
                        @error('date_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали дату</div>
                        @enderror
                    </div>
                    <button class="btn btn-success d-block m-auto" type="submit">Добавить расписание</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
