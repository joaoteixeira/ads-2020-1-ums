@extends('layouts.principal')
@section('title', 'SGBD')
@section('title-content', 'SGBDs Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-sucess">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('sgbds.create') }}">Cadastrar SGBD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th><th>NOME</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sgbds as $sgbd)
                <tr>
                    <td>{{ $loop->iteration }}</td><td>{{ $sgbd->NOME }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection