@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            {{ __('Agregar padre') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.padre', ['id' => $tutor->id]) }}">
                            @csrf

                            {{-- class_tutor --}}
                            <div class="row mb-3">
                                <label for="class_tutor"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Clasificacion del tutor/padre') }}</label>

                                <div class="col-md-6">
                                    <select name="class_tutor" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la clasificaion del tutor</option>
                                        @foreach ($tutorClass as $tutorClasses)
                                            <option selected value="{{ $tutorClasses->id }}">
                                                {{ $tutorClasses->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $tutor->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- apellido --}}
                            <div class="row mb-3">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" value="{{ $tutor->surname }}"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="name" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- edad --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" value="{{ $tutor->age }}"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" required autocomplete="age" autofocus>

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- enviar --}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('actualizar tutor') }}
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
