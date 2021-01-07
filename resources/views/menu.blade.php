<li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Главная') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('route1') ? 'active' : '' }}">
    <a class="nav-link" href="#">{{ __('Link 1') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('parser') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('parser') }}">{{ __('Загрузка каталога') }}</a>
</li>
@if (!empty(Auth::user()->isAdmin))
    <li class="nav-item dropdown {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Администрирование') }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Новости</h6>
            <a class="dropdown-item" href="#">
                {{ __('Загрузка') }}
            </a>
            <a class="dropdown-item" href="#">
                {{ __('Редактирование') }}
            </a>
            <a class="dropdown-item" href="#">
                {{ __('Добавление') }}
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Категории</h6>
            <a class="dropdown-item" href="#">
                {{ __('Редактирование') }}
            </a>
            <a class="dropdown-item" href="#">
                {{ __('Добавление') }}
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Источники</h6>
            <a class="dropdown-item" href="#">
                {{ __('Редактирование') }}
            </a>
            <a class="dropdown-item" href="#">
                {{ __('Добавление') }}
            </a>
        </div>
    </li>
@endif
