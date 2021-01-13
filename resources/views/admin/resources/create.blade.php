@extends ('layouts.main')
@section ('title','Редактирование источников')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавить ссылку на каталог') }}</div>
                    <div class="card-body">
                        <form method="post"
                              action="@if (!$resource->id){{ route('admin.resources.create') }}@else{{ route('admin.resources.update', $resource) }}@endif">
                            @csrf
                            <div class="form-group">
                                @if ($errors->has('link'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('link') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control" id="link"
                                       aria-describedby="linkHelp"
                                       placeholder="Ссылка на каталог" name="link"
                                       value="{{ old('link') ?? $resource->link ?? '' }}">
                                <small id="linkHelp" class="form-text text-muted">Введите ссылку</small>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('store'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('store') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control" id="store"
                                       aria-describedby="storeHelp"
                                       placeholder="Название магазина" name="store"
                                       value="{{ old('store') ?? $resource->store ?? '' }}">
                                <small id="storeHelp" class="form-text text-muted">Введите магазин</small>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                @if ($resource->id){{ __('Изменить') }}@else{{ __('Добавить') }}@endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
