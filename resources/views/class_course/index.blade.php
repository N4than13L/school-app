@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Clasificacion de cursos</h3>
                        <a class="btn btn-success" href="#"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Período</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Aciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course_class as $course_classes)
                                <tr>
                                    <td scope="row">{{ $course_classes->id }}</td>


                                    <td scope="row">
                                        <a href="#" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                    </table>


                    {{-- <div class="clearfix">
                        {{ $semester->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
