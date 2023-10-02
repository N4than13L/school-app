@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('listado de alumnos ') }}</h3>
                        <a class="btn btn-success" href="{{ route('add.students') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Eddad</th>
                                <th scope="col">sexo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $students)
                                <tr>
                                    <td scope="row">{{ $students->id }}</td>
                                    <td scope="row">{{ $students->name }}</td>
                                    <td scope="row">{{ $students->surname }}</td>
                                    <td scope="row">{{ $students->age }}</td>
                                    <td scope="row">{{ $students->sex }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
