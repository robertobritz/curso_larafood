@extends('adminlte::page')

@section('title', 'Detalhe da Produto')

@section('content_header')
<h1>Detalhe da Produto <b>{{ $product->name }}</b> </h1>
@stop
@include('admin.includes.alert')
@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                </li>
                <li>
                    <strong>Titulo: </strong> {{ $product->title}}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $product->flag}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>

        <form action="{{ route('products.destroy', $product->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar a Produto {{ $product->title}}</button>        
        </form>
        </div>
    </div>
@endsection