@extends('layouts.principal')
@section('title', 'Usuários')
@section('title-content', 'Deletar Usuário')
@section('content')
    @if (isset($mensagem))
        <div class="alert alert-danger" role="alert">
             {{ $mensagem }}
        </div>
    @endif
    <form action="/usuarios/{{ $usuario->ID }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Deletar</button>
        <a href="/usuarios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection