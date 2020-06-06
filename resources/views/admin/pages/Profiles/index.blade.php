@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profile.index') }}" class="active">Pefil</a></li>
    </ol>
<h1>Perfis <a href="{{ route('profile.create')}}" class="btn btn-dark"><i class="fas fa-plus-square"></i>ADD</a></h1>

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
                        <th>Descrição</th>
                        <th width="290">Ações</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td> {{ $profile->name }}</td>
                            <td> {{ $profile->description }} </td>
                        <td style="width=10px;">
                           {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}} 
                           <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                           <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-warning">VER</a>
                           <a href="{{ route('profile.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                           <a href="{{ route('profile.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>
                         </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop

