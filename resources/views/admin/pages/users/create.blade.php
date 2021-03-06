@extends('adminlte::page')

@section('title', 'Cadastrar novo Usuário')

@section('content_header')
<h1>Cadastrar novo Usuário </h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @csrf

                @include('admin\pages\users\_partials\form')
            </form>
        </div>
    <div>
@endsection