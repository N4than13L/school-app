@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">

                        <h3 class="text-center">{{ __('Apgragar Padres o tutores') }}</h3>
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
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tutor as $tutors)
                                <tr>
                                    <td scope="row">{{ $tutors->id }}</td>
                                    <td scope="row">{{ $tutors->name }}</td>
                                    <td scope="row">{{ $tutors->surname }}</td>
                                    <td scope="row">{{ $tutors->age }}</td>
                                </tr>
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
