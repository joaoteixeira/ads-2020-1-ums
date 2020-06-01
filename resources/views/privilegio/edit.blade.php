@extends('layouts.principal')
@section('title', 'Privilégios')
@section('title-content', 'Editar Privilégio')
@section('content')
    <form action="/privilegios/{{ $privilegio->ID }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="NOME" value="{{ $privilegio->NOME }}" >
        </div>
        <div class="form-group">
            <label for="">SGBD</label>
            <select class="form-control" name="SGBD_ID">
            @foreach($sgbds as $sgbd)
                <option value="{{ $sgbd->ID }}" @if ($privilegio->SGBD_ID==$sgbd->ID) selected @endif >{{ $sgbd->NOME }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/privilegios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection