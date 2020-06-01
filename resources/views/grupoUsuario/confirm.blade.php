@extends('layouts.principal')
@section('title', 'Grupos de Usuários')
@section('title-content', 'Deletar Grupo')
@section('content')
    @if (isset($mensagem))
        <div class="alert alert-danger" role="alert">
             {{ $mensagem }}
        </div>
    @endif
    <form action="/gruposUsuarios/{ $grupo->ID }" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Deletar</button>
        <a href="/gruposUsuarios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection