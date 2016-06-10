@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="list-group">
                    <a href="{{ route('categoria.index') }}" class="list-group-item">
                        Categorias
                    </a>
                    @if ($entity->parent_id > 0)
                        <a href="{{ route('categoria.visualizar', ['id' => $entity->parent->id, 'slug' => $entity->parent->slug]) }}"
                           class="list-group-item">
                            {{ $entity->parent->titulo }}
                        </a>
                    @endif
                    <a href="{{ route('categoria.visualizar', [ 'id' => $entity->id, 'slug' => $entity->slug ]) }}"
                       class="list-group-item active">{{ $entity->titulo }}</a>
                    @foreach($entity->children as $child)
                        <a href="{{ route('categoria.visualizar', ['id' => $child->id, 'slug' => $child->slug]) }}"
                           class="list-group-item">
                            {{ $child->titulo }}
                        </a>
                    @endforeach
                </div>
                @if (count($entity->filtros) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">Filtros</div>
                        <div class="panel-body">
                            @foreach($entity->filtros as $filtro)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="filtro[]" value="{{ $filtro->id }}"/>
                                        {{ $filtro->titulo }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

            </div>
        </div>
    </div>
@endsection