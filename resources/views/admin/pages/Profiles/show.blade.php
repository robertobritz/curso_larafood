@extends('adminlte::page')

@section('title', 'Detalhe do Perfil')

@section('content_header')
<h1>Detalhe do Perfil <b>{{ $profile->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name}}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $profile->description}}
                </li>
            </ul>

        <form action="{{ route('profile.destroy', $profile->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar o Perfil {{ $profile->name}}</button>        
        </form>
        </div>
    </div>
@endsection