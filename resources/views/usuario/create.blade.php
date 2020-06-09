@extends('layouts.principal')
@section('title', 'Usuários')
@section('title-content', 'Novo Usuário')
@section('content')
    <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome do Usuário no Banco de Dados</label>
            <input type="text" class="form-control" name="USER">
        </div>
        <div class="form-group">
            <label for="">Senha do Usuário</label>
            <div class="input-group" id="showPassword">
                <div class="input-group-prepend">
                    <i class="far fa-eye-slash fa-lg" aria-hidden="true" style="margin-top: .50em; margin-right: .40em;"></i>
                </div>
                <input type="password" class="form-control" name="SENHA">
            </div>
        </div>
        <div class="form-group">
            <label for="">Host de Acesso</label>
            <input type="text" value="%" class="form-control" name="HOST">
        </div>
        <div class="form-group">
            <label for="">Grupo de Usuário</label>
            <select class="form-control" name="GRUPO_USUARIO_ID">
            @foreach($grupos as $grupo)
                <option value="{{ $grupo->ID }}">{{ $grupo->NOME }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
