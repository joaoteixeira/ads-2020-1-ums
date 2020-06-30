@extends('layouts.principal')
@section('title', 'Acessos')
@section('title-content', 'Acessos Cadastrados')
@section('content')
    <div class="title m-b-md">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('acessos.create') }}">Cadastrar Acesso</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>USER</th>
                    <th>INICIO</th>
                    <th>AMBIENTE</th>
                    <th>PRIVILEGIOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acessos as $acesso)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $acesso->USER }}</td>
                    <td>{{ $acesso->INICIO }}</td>
                    <td>{{ $acesso->AMBIENTE }}</td>
                    <td>{{ $acesso->PRIVILEGIOS }}</td>
                    <td><a href="acessos/{{ $acesso->ID }}/edit"><i class="far fa-edit"></i></a><a href="acessos/confirm/{{ $acesso->ID }}"><i class="fas fa-trash-alt"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection