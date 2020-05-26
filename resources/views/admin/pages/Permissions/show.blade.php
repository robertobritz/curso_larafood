@extends('adminlte::page')

@section('title', 'Detalhe da permissão')

@section('content_header')
<h1>Detalhe da permissão <b>{{ $permission->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name}}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $permission->description}}
                </li>
            </ul>

        <form action="{{ route('permission.destroy', $permission->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar o Perfil {{ $permission->name}}</button>        
        </form>
        </div>
    </div>
@endsection