@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container p-5">
        <h2 class="text-center p-4">Регистрация пользователя</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="nameInput">ФИО</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="loginInput" name="name" type="text">
                        @error('name')
                        <div id="invalidName" class="invalid-feedback">Вы не указали ФИО</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="orderStatus">Тип пользователя</label>
                        <select id="orderStatus" name="role_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите тип пользователя</option>
                            @foreach($roles as $role)
                            <option value="{{$role -> id}}">{{$role -> name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="orderStatus">К какой группе принадлжит пользователь (Если студент)</label>
                        <select id="orderStatus" name="group_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите группу</option>
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="loginInput">Логин</label>
                        <input class="form-control @error('login') is-invalid @enderror" id="loginInput" name="login" type="text">
                        @error('login')
                        <div id="invalidLogin" class="invalid-feedback">Вы не указали логин</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="passwordInput">Пароль</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" type="password">
                        @error('password')
                        <div id="invalidPassword" class="invalid-feedback">Вы не указали пароль</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="passwordInput_confirmation">Пароль повторно</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" id="passwordInput_confirmation" name="password_confirmation" type="password">
                        @error('password_confirmation')
                        <div id="invalidPassword_confirmation" class="invalid-feedback">Введите пароль повторно</div>
                        @enderror
                    </div>
                    <button class="btn btn-success d-block m-auto" type="submit">Зарегистрировать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
