@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container p-5">
        <h2 class="text-center p-4">Изменение пользователя</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="nameInput">ФИО</label>
                        <input value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" id="loginInput" name="name" type="text">
                        @error('name')
                        <div id="invalidName" class="invalid-feedback">Вы не указали ФИО</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="orderStatus">Тип пользователя</label>
                        <select id="orderStatus" name="role_id" class="form-select" aria-label="Default select example">
                            <option selected value="{{$roleUser->id}}">{{$roleUser->name}}</option>
                            @foreach($roles as $role)
                                @if($role->id != $roleUser->id)
                                <option value="{{$role -> id}}">{{$role -> name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="orderStatus">К какой группе принадлжит пользователь (Если студент)</label>
                        <select id="orderStatus" name="group_id" class="form-select" aria-label="Default select example">
                            @if($user->role_id == 2)<option selected value="{{$groupUser->id}}">{{$groupUser->name}}</option>
                            @elseif($user->role_id != 2)<option selected>Выберите группу</option>@endif
                            @if($role->id == 2)
                            @foreach($groups as $group)
                                @if($group->id != $groupUser->id)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endif
                            @endforeach
                            @else()
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            @endif
                            @if($role->id == 2)
                            <option value="0">Не студент</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="loginInput">Логин</label>
                        <input value="{{$user->login}}" class="form-control @error('login') is-invalid @enderror" id="loginInput" name="login" type="text">
                        @error('login')
                        <div id="invalidLogin" class="invalid-feedback">Вы не указали логин</div>
                        @enderror
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label mb-2" for="passwordInput">Новый Пароль</label>--}}
{{--                        <input class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" type="password">--}}
{{--                        @error('password')--}}
{{--                        <div id="invalidPassword" class="invalid-feedback">Вы не указали пароль</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label mb-2" for="passwordInput_confirmation">Пароль повторно</label>--}}
{{--                        <input class="form-control @error('password_confirmation') is-invalid @enderror" id="passwordInput_confirmation" name="password_confirmation" type="password">--}}
{{--                        @error('password_confirmation')--}}
{{--                        <div id="invalidPassword_confirmation" class="invalid-feedback">Введите пароль повторно</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
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
