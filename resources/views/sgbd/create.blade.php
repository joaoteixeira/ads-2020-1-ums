@extends('layouts.principal')
@section('title', 'SGBD')
@section('title-content', 'Novo SGBD')
@section('content')
    <form action="{{ route('sgbds.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="NOME">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection