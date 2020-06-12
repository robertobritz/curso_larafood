@extends('adminlte::page')

@section('title', 'Detalhe do Usuário')

@section('content_header')
<h1>Detalhe do Usuário <b>{{ $user->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $user->name}} 
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{ $user->tenant->name}}
                </li>
            </ul>

        <form action="{{ route('users.destroy', $user->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar o Usuário {{ $user->name}}</button>        
        </form>
        </div>
    </div>
@endsection