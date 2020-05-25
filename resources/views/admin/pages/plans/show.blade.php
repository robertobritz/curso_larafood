@extends('adminlte::page')

@section('title', 'Detalhe do Plano')

@section('content_header')
<h1>Detalhe do Plano <b>{{ $plan->name }}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> 
                </li>
                <li>
                    <strong>URL: </strong> {{ $plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.' )}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description}}
                </li>
            </ul>

        <form action="{{ route('plans.destroy', $plan->url)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Deletar o Plano {{ $plan->name}}</button>        
        </form>
        </div>
    </div>
@endsection