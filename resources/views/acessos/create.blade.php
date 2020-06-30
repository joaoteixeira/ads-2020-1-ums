@extends('layouts.principal')
@section('title', 'Acessos')
@section('title-content', 'Novo Acesso')
@section('content')
    <form action="{{ route('acessos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">USUÁRIO</label>
            <select class="form-control" name="USUARIO_ID">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->ID }}">{{ $usuario->USER }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">AMBIENTE</label>
            <select class="form-control" name="AMBIENTE_ID">
            @foreach($ambientes as $ambiente)
                <option value="{{ $ambiente->ID }}">{{ $ambiente->NOME }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="TEMPORARIO">
            <label class="form-check-label" for="gridCheck">Usuário Temporário</label>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection