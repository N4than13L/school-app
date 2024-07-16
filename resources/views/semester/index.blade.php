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
                                <th scope="col">Periódo</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Aciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semester as $semesters)
                                <tr>
                                    <td scope="row">{{ $semesters->id }}</td>
                                    <td scope="row">{{ $semesters->period }}</td>
                                    <td scope="row">{{ $semesters->Subject->name }}</td>
                                    <td scope="row">
                                        {{ $semesters->courses->name }}
                                    </td>

                                    <td scope="row">
                                        <a href="{{ route('edit.period', ['id' => $semesters->id]) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a> --}}
                                    </td>

                                </tr>
                            @endforeach

                    </table>


                    <div class="clearfix">
                        {{ $semester->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
