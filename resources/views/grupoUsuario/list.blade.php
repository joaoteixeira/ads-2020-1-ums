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
        <a class="btn btn-primary" href="{{ route('gruposUsuarios.create') }}">Cadastrar Grupo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE DE USUÁRIOS</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $grupo->NOME }}</td>
                    <td>{{ $grupo->DESCRICAO }}</td>
                    <td>{{ $grupo->QTD_USUARIOS }}</td>
                    <td><a href="/gruposUsuarios/{{ $grupo->ID }}/edit"><i class="far fa-edit"></i></a><a href="gruposUsuarios/confirm/{{ $grupo->ID }}"><i class="fas fa-trash-alt"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection