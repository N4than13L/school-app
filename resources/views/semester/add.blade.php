@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Agregar asignatura') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save.subject') }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- teacher_id --}}
                            <div class="row mb-3">
                                <label for="class_teacher"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Clasificacion del tutor/padre') }}</label>

                                <div class="col-md-6">
                                    <select name="class_teacher" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la asignatura</option>
                                        {{-- @foreach ($teacher as $teachers)
                                            <option value="{{ $teachers->id }}">
                                                {{ $teachers->name }}</option>
                                        @endforeach --}}

                                    </select>
                                </div>
                            </div>

                            {{-- estudiante --}}
                            <div class="row mb-3">
                                <label for="class_teacher"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Clasificacion del tutor/padre') }}</label>

                                <div class="col-md-6">
                                    <select name="class_teacher" class="form-select" aria-label="Default select example">
                                        <option selected>Seleccionar alumno</option>
                                        {{-- @foreach ($teacher as $teachers)
                                            <option value="{{ $teachers->id }}">
                                                {{ $teachers->name }}</option>
                                        @endforeach --}}

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
