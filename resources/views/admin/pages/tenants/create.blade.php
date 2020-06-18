@extends('adminlte::page')

@section('title', 'Cadastrar novo Tenant')

@section('content_header')
<h1>Cadastrar novo Tenant </h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-body">
            <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin\pages\tenants\_partials\form')
            </form>
        </div>
    <div>
@endsection