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
                            <div class="form-group">
                                <label class="my-1 mr-2" for="resourcesCategory">Категория</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" id="resourcesCategory" class="custom-select my-1 mr-sm-2">
                                    @forelse($categories as $key => $value)
                                        @if (old('category_id'))
                                            <option @if ($value->id == old('category_id')) selected
                                                    @endif value="{{ $value->id }}">{{ $value->text }}
                                        @else
                                            <option @if (!empty($category_id) && $value->id == $category_id) selected
                                                    @endif
                                                    value="{{ $value->id }}">{{ $value->text }}</option>
                                        @endif
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
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
