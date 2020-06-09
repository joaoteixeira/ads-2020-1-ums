@extends('layouts.principal')
@section('title', 'Usuários')
@section('title-content', 'Usuários Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Cadastrar Usuário</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>USER</th>
                    <th>HOST</th>
                    <th>GRUPO</th>
                    <th>ULTIMA ALTERAÇÃO</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usuario->USER }}</td>
                    <td>{{ $usuario->HOST }}</td>
                    <td>{{ $usuario->GRUPO }}</td>
                    <td>{{ $usuario->DATA }}</td>
                    <td><a href="usuarios/{{ $usuario->ID }}/edit"><i class="far fa-edit"></i></a><a href="usuarios/confirm/{{ $usuario->ID }}"><i class="fas fa-trash-alt"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection