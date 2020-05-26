@extends('adminlte::page')

@section('title', "Edotar o perfil {$profile->name}")

@section('content_header')
<h1>Edotar o perfil profileo {{ $profile->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-body">
            <form action="{{ route('profile.update', $profile->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin\pages\profiles\_partials\form')
            </form>
        </div>
    <div>
@endsection