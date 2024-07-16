@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Agregar semestre') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save.period') }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="period"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Periodo') }}</label>

                                <div class="col-md-6">
                                    <input id="period" type="text"
                                        class="form-control @error('period') is-invalid @enderror" name="period"
                                        value="{{ old('period') }}" required autocomplete="period" autofocus>

                                    @error('period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- asignatura --}}
                            <div class="row mb-3">
                                <label for="subject"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Selecciona la asignatura') }}</label>

                                <div class="col-md-6">
                                    <select name="subject" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la asignatura</option>
                                        @foreach ($subject as $subjects)
                                            <option value="{{ $subjects->id }}">
                                                {{ $subjects->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- curso --}}
                            <div class="row mb-3">
                                <label for="course"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cursos disponibles') }}</label>

                                <div class="col-md-6">
                                    <select name="course" class="form-select" aria-label="Default select example">
                                        <option>Seleccionar alumno</option>
                                        @foreach ($course as $courses)
                                            <option selected value="{{ $courses->id }}">
                                                {{ $courses->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Agregar semestre') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
