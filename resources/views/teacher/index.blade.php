@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de Maestros') }}</h3>
                        <a class="btn btn-success" href="{{ route('add.teachers') }}"><i class="fas fa-plus"></i></a>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">RNC</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $teachers)
                                <tr>
                                    <td scope="row">{{ $teachers->id }}</td>
                                    <td scope="row">{{ $teachers->name }}</td>
                                    <td scope="row">{{ $teachers->surname }}</td>
                                    <td scope="row">{{ $teachers->RNC }}</td>
                                    <td scope="row">{{ $teachers->Subject->name }}</td>
                                    <td scope="row">

                                        <a href="{{ route('teachers.edit', ['id' => $teachers->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
