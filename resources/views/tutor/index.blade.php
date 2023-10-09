@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">

                        <h3 class="text-center">{{ __('Agregar Padres o tutores') }}</h3>
                        <a class="btn btn-success" href="{{ route('agregar_padre') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Edad</th>
                                <th scope="col">Clasificación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tutor as $tutors)
                                <tr>
                                    <td scope="row">{{ $tutors->id }}</td>
                                    <td scope="row">{{ $tutors->name }}</td>
                                    <td scope="row">{{ $tutors->surname }}</td>
                                    <td scope="row">{{ $tutors->age }}</td>
                                    <td scope="row">{{ $tutors->Tutor_Class->name }}</td>

                                    <th scope="col">

                                        <a href="{{ route('edit.padre', ['id' => $tutors->id]) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </th>


                                </tr>
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
