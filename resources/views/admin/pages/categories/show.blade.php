@extends('adminlte::page')

@section('title', 'Detalhe da Categoria')

@section('content_header')
<h1>Detalhe da Categoria <b>{{ $category->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $category->name}} 
                </li>
                <li>
                    <strong>URL: </strong> {{ $category->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $category->description }}
                </li>
            </ul>

        <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar a Categoria {{ $category->name}}</button>        
        </form>
        </div>
    </div>
@endsection