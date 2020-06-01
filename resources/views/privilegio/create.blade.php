@extends('layouts.principal')
@section('title', 'Privilégios')
@section('title-content', 'Novo Privilégio')
@section('content')
    <form action="{{ route('privilegios.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome do Privilégio</label>
            <input type="text" class="form-control" id="" name="NOME">
        </div>
        <div class="form-group">
            <label for="">SGBD's válidos para o privilégio</label>
            <select class="js-multiple form-control" multiple="multiple">
            @foreach($sgbds as $sgbd)
                <option id="{{ $sgbd->ID }}" value="{{ $sgbd->ID }}">{{ $sgbd->NOME }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" hidden id="teste" class="js-multiple-data" value="">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
