@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="list-group">
                    <a class="list-group-item active">Categorias</a>
                    @foreach($list as $item)
                        <a href="{{ route('categoria.visualizar', ['id' => $item->id, 'slug' => $item->slug ]) }}" class="list-group-item">
                            {{ $item->titulo }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection