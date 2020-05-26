@extends('layouts.principal')
@section('title', 'Grupos de Usuários')
@section('title-content', 'Novo Grupo de Usuários')
@section('content')
    <form action="{{ route('gruposUsuarios.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome do Grupo</label>
            <input type="text" class="form-control" id="" name="NOME">
        </div>
        <div class="form-group">
            <label for="">Descrição do Grupo</label>
            <input type="text" class="form-control" id="" name="DESCRICAO">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection