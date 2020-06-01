@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profile.index') }}" class="active">Pefil</a></li>
    </ol>
<h1>Permissões do perfil <b>{{$profile->name}} </b> <a href="{{ route('profile.permissions.avaliable', $profile->id) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i>ADD NOVA PERMISSÃO</a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profile.search') }}" method="post" class='form form-inline'>
                @csrf
            <input type="text" name="filter" placeholder="filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td> {{ $permission->name }}</td>
                        <td style="width=10px;">
                                <a href="{{ route('profile.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-lock"></i>Remover</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop

