@extends('layouts.principal')
@section('title', 'Grupos de Usuários')
@section('title-content', 'Editar Grupo')
@section('content')
    <form action="/gruposUsuarios/{{ $grupo->ID }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="NOME" value="{{ $grupo->NOME }}" >
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" class="form-control" id="" name="DESCRICAO" value="{{ $grupo->DESCRICAO }}" >
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/gruposUsuarios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection