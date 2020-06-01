@extends('layouts.principal')
@section('title', 'Privilégios')
@section('title-content', 'Privilégios Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('privilegios.create') }}">Cadastrar Privilégio</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>SGBD</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($privilegios as $privilegio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $privilegio->NOME }}</td>
                    <td>{{ $privilegio->SGBD }}</td>
                    <td><a href="privilegios/{{ $privilegio->ID }}/edit"><i class="far fa-edit"></i></a><a href="privilegios/confirm/{{ $privilegio->ID }}"><i class="fas fa-trash-alt"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection