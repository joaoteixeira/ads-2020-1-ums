@extends('layouts.principal')
@section('title', 'Ambientes')
@section('title-content', 'Ambientes Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('ambientes.create') }}">Cadastrar Ambiente</a>
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
                @foreach($ambientes as $ambiente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ambiente->NOME }}</td>
                    <td>{{ $ambiente->SGBD }}</td>
                    <td><a href="ambientes/{{ $ambiente->ID }}/edit"><i class="far fa-edit"></i></a><a href="ambientes/confirm/{{ $ambiente->ID }}"><i class="fas fa-trash-alt"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection