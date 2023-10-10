@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de asignaturas ') }}</h3>
                        <a class="btn btn-success" href="{{ route('add.subject') }}"><i class="fas fa-plus"></i></a>
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
                            @foreach ($subject as $subjects)
                                <tr>
                                    <td scope="row">{{ $subjects->id }}</td>
                                    <td scope="row">{{ $subjects->name }}</td>
                                    <td scope="row">

                                        <a href="{{ route('edit.subject', ['id' => $subjects->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('delete.subject', ['id' => $subjects->id]) }}"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="clearfix">
                        {{ $subject->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
