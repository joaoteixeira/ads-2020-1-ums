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
                    <th>ID</th><th>NOME</th>
                </tr>
            </thead>
            <tbody>
                @foreach($privilegios as $privilegio)
                <tr>
                    <td>{{ $loop->iteration }}</td><td>{{ $grupo->NOME }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection