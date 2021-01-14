@extends ('layouts.main')
@section ('title','Источники')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ссылки на каталоги</h3>
                    </div>
                    <div class="card-body">
                        @forelse($resources as $key => $value)
                            <p><b>Ссылка</b>&nbsp;{{ $value->link }}</p>
                            <p><b>Магазин</b>&nbsp;{{ $value->store }}</p>
                            <p><b>Категория товара</b>&nbsp;{{ $value->category->text }}</p>
                            <a href="{{ route('admin.resources.edit', $value) }}" class="card-link btn btn-success">
                                {{ __('Изменить') }}
                            </a>
                            <a href="{{ route('admin.resources.destroy', $value) }}" class="card-link btn btn-danger">
                                {{ __('Удалить') }}
                            </a>
                        @empty
                            Нет ни одной ссылки на каталог
                        @endforelse
                    </div>
                    <div class="card-footer">
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
