@extends('welcome')
@section('title', 'Добавление группы')
@section('content')
    <div style="height: 60vh;" class="container d-grid align-content-center p-5">
        <h2 class="text-center p-4">Добавление группы</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="nameInput">Номер группы</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="loginInput" name="name" type="text">
                        @error('name')
                        <div id="invalidName" class="invalid-feedback">Вы не указали номер группы</div>
                        @enderror
                    </div>
                    <button class="btn btn-success d-block m-auto" type="submit">Добавить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
