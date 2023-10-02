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
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($subject as $subjects)
                                <tr>
                                    <td scope="row">{{ $subjects->id }}</td>
                                    <td scope="row">{{ $subjects->name }}</td>
                                </tr>
                            @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
