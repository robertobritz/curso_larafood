@extends('adminlte::page')

@section('title', 'Cadastrar novo Produto')

@section('content_header')
<h1>Cadastrar novo Produto </h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin\pages\products\_partials\form')
            </form>
        </div>
    <div>
@endsection