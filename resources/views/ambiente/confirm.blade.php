@extends('layouts.principal')
@section('title', 'Ambientes')
@section('title-content', 'Deletar Ambiente')
@section('content')
    @if (isset($mensagem))
        <div class="alert alert-danger" role="alert">
             {{ $mensagem }}
        </div>
    @endif
    <form action="/ambientes/{{ $ambiente->ID }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Deletar</button>
        <a href="/ambientes" class="btn btn-danger">Cancelar</a>
    </form>
@endsection