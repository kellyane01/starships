@extends('layouts.app')

@section('content')
    <h1>Página Não Encontrada</h1>
    <div class="text-center">
        <p>A página que você está procurando não existe.</p>
        <a class="btn btn-secondary" href="{{ url('/') }}">Voltar para a lista</a>
    </div>
@endsection
