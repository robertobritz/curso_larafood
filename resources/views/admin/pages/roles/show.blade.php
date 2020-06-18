@extends('adminlte::page')

@section('title', 'Detalhe do Cargo')

@section('content_header')
<h1>Detalhe do Cargo <b>{{ $role->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->name}}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $role->description}}
                </li>
            </ul>

        <form action="{{ route('roles.destroy', $role->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar o Cargo {{ $role->name}}</button>        
        </form>
        </div>
    </div>
@endsection