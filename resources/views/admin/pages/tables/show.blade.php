@extends('adminlte::page')

@section('title', 'Detalhe da Mesas')

@section('content_header')
<h1>Detalhe da Mesas <b>{{ $table->identify }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Identificador da mesa: </strong> {{ $table->identify}} 
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $table->description }}
                </li>
            </ul>

        <form action="{{ route('tables.destroy', $table->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar a Mesa {{ $table->identify}}</button>        
        </form>
        </div>
    </div>
@endsection