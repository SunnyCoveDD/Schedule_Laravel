@extends('users.admin')
@section('title', 'Добавление расписания')
@section('content')
    <div class="container pb-5">
        <h3 class="text-center p-4">Изменение расписания</h3>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="number">Номер пары</label>
                        <select id="number" name="number" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected>{{$pairs->number}}</option>
                            @for($i = 1; $i<=8; $i++ )
                                @if($pairs->number != $i)
                                <option value="$i">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                        @error('number')
                        <div id="invalidName" class="invalid-feedback">Вы не указали номер пары</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="group">Группа</label>
                        <select id="group" name="group_id" class="form-select @error('group_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="{{$groupPair->id}}">{{$groupPair->name}}</option>
                            @foreach($groups as $group)
                                @if($groupPair->id != $group->id)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('group_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали пары</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="subject">Предмет</label>
                        <select id="subject" name="subject_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="{{$subjectPair->id}}">{{$subjectPair->name}}</option>
                            @foreach($subjects as $subject)
                                @if($subjectPair->id != $subject->id)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали предмет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="user">Преподаватель</label>
                        <select id="user" name="user_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="{{$userPair->id}}">{{$userPair->name}}</option>
                            @foreach($users as $user)
                                @if($userPair->id != $user->id)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('user_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали преподавателя</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="cabinet">Кабинет</label>
                        <select id="cabinet" name="cabinet_id" class="form-select @error('number') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="{{$cabinetPair->id}}">{{$cabinetPair->number}}</option>
                            @foreach($cabinets as $cabinet)
                                @if($cabinetPair->id != $cabinet->id)
                                <option value="{{$cabinet->id}}">{{$cabinet->number}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('cabinet_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали кабинет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="date">Дата</label>
                        <input type='date' value="{{$pairs->date_id}}" class="form-control @error('date_id') is-invalid @enderror" id="date" name="date_id">
                        @error('date_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали дату</div>
                        @enderror
                    </div>
                    <div class="d-flex pt-4">
                        <a class="link-secondary text-decoration-none ps-5" href="{{route('admin')}}">Отмена операции</a>
                        <button class="btn btn-success d-block m-auto" type="submit">Изменить</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
