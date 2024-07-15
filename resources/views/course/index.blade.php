@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Cursos</h3>
                        <a class="btn btn-success" href="{{ route('course.add') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Clasificación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $courses)
                                <tr>
                                    <td scope="row">{{ $courses->id }}</td>
                                    <td scope="row">{{ $courses->name }}</td>
                                    <td scope="row">{{ $courses->course_class->name }}</td>

                                    <td scope="row">
                                        <a href="{{ route('course.edit', ['id' => $courses->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('course.delete', ['id' => $courses->id]) }}"
                                            class="btn btn-danger">
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
