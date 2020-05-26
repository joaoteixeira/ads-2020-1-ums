@extends('layouts.principal')
@section('title', 'Ambientes')
@section('title-content', 'Editar Ambiente')
@section('content')
    <form action="/ambientes/{{ $ambiente->ID }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="NOME" value="{{ $ambiente->NOME }}" >
        </div>
        <div class="form-group">
            <label for="">SGBD</label>
            <select class="form-control" name="SGBD_ID">
            @foreach($sgbds as $sgbd)
                <option value="{{ $sgbd->ID }}" @if ($ambiente->SGBD_ID==$sgbd->ID) selected @endif >{{ $sgbd->NOME }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/ambientes" class="btn btn-danger">Cancelar</a>
    </form>
@endsection