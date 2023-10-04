@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">

                        <h3 class="text-center">{{ __('Clasificaciones') }}</h3>
                        <a class="btn btn-success" href="{{ route('agregar') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tutorClass as $tutorClasses)
                                <tr>
                                    <td scope="row">{{ $tutorClasses->id }}</td>
                                    <td scope="row">{{ $tutorClasses->name }}</td>
                                    <td scope="row">
                                        <a href="{{ route('tutorclass.edit', ['id' => $tutorClasses->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
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
