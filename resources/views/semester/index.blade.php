@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('listado de periodos o semestres') }}</h3>
                        <a class="btn btn-success" href="{{ route('add.period') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">periodo</th>
                                <th scope="col">asignatura</th>
                                <th scope="col">estudiante</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($student as $students)
                                <tr>
                                    <td scope="row">{{ $students->id }}</td>
                                    <td scope="row">{{ $students->name }}</td>
                                    <td scope="row">{{ $students->surname }}</td>
                                    <td scope="row">{{ $students->age }}</td>
                                    <td scope="row">{{ $students->sex }}</td>
                                </tr>
                            @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
