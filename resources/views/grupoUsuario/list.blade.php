@extends('layouts.principal')
@section('title', 'Grupos de Usuários')
@section('title-content', 'Grupos de Usuários Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('gruposUsuarios.create') }}">Cadastrar Ambiente</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th><th>NOME</th><th>DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $loop->iteration }}</td><td>{{ $grupo->NOME }}</td><td>{{ $grupo->DESCRICAO }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection