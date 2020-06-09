@extends('layouts.principal')
@section('title', 'Privilégios')
@section('title-content', 'Editar Privilégio')
@section('content')
    <form action="/privilegios/{{ $usuario->ID }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control text-uppercase" id="" name="NOME" value="{{ $usuario->NOME }}" >
        </div>
        <div class="form-group">
            <label for="">SGBD's válidos para o privilégio</label>
            <select class="js-multiple form-control" multiple="multiple">
            @foreach($sgbds as $sgbd)
                <option id="{{ $sgbd->ID }}" value="{{ $sgbd->ID }}" @if (in_array($sgbd->ID, $ids)) selected @endif>{{ $sgbd->NOME }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" hidden id="dadosSGBD" name="SGBD_ID" value="">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/privilegios" class="btn btn-danger">Cancelar</a>
    </form>
@endsection