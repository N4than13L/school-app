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
                                <th scope="col">padre/tutor</th>
                                <th scope="col">Maestro</th>
                                <th scope="col">Aciones</th>
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
                                    <td scope="row">{{ $students->Tutors->name }}</td>
                                    <td scope="row">{{ $students->Teachers->name }}</td>

                                    <td scope="row">
                                        <a href="{{ route('edit.students', ['id' => $students->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('delete.students', ['id' => $students->id]) }}"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>

                    <div class="clearfix">
                        {{ $student->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
