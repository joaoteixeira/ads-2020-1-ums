@extends('layouts.principal')
@section('title', 'Ambientes')
@section('title-content', 'Novo Ambiente')
@section('content')
    <form action="{{ route('ambientes.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="NOME">
        </div>
        <div class="form-group">
            <label for="">SGBD</label>
            <select class="form-control" name="SGBD_ID">
            @foreach($sgbds as $sgbd)
                <option value="{{ $sgbd->ID }}">{{ $sgbd->NOME }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection