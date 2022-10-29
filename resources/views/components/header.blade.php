<header>
    <div class="bg-light shadow">
        <nav class="container navbar navbar-expand-md">
            <div class="d-flex container-fluid">
                <a href="{{route('/')}}"><img width="100px" src="/resources/img/logo.png" alt="Логотип"></a>
                <ul class="navbar-nav d-flex me-auto">
                    @auth()
                        @if(Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin')}}">Панель администратора</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    Добавление информации
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{route('add_pairs')}}">Добавить расписание</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('add_group')}}">Добавить группу</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('add_cab')}}">Добавить кабинет</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('add_sub')}}">Добавить предмет</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('reg')}}">Зарегестрировать пользователя</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>
                @guest()
                    <div class="nav-item text-end">
                        <a type="button" href="{{route('login')}}" class="btn btn-outline-success">Авторизация</a>
                    </div>
                @endguest
                @auth()
                    <div class="nav-item text-end">
                        <a type="button" href="{{route('logout')}}" class="btn btn-danger">Выйти</a>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>
