<li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Главная') }}</a>
</li>
<li class="nav-item dropdown {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Администрирование') }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Источники</h6>
            <a class="dropdown-item" href="{{ route('parser') }}">
                {{ __('Загрузка каталогов') }}
            </a>
            <a class="dropdown-item" href="{{ route('admin.resources.index') }}">
                {{ __('Редактирование') }}
            </a>
            <a class="dropdown-item" href="{{ route('admin.resources.create') }}">
                {{ __('Добавление') }}
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Пользователи</h6>
            <a class="dropdown-item" href="#">
                {{ __('Редактирование') }}
            </a>
            <a class="dropdown-item" href="#">
                {{ __('Добавление') }}
            </a>
        </div>
</li>
