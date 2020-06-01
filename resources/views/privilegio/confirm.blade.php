@extends('layouts.principal')
@section('title', 'Privilégios')
@section('title-content', 'Deletar Privilégio')
@section('content')
    @if (isset($mensagem))
        <div class="alert alert-danger" role="alert">
             {{ $mensagem }}
        </div>
    @endif
    <form action="/privilegios/{ $privilegio->ID }" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Deletar</button>
        <a href="/privilegios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection