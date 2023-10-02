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


                            {{-- surname --}}
                            <div class="row mb-3">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('name') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- RNC --}}
                            <div class="row mb-3">
                                <label for="rnc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('RNC') }}</label>

                                <div class="col-md-6">
                                    <input id="rnc" type="text"
                                        class="form-control @error('rnc') is-invalid @enderror" name="rnc"
                                        value="{{ old('rnc') }}" required autocomplete="rnc" autofocus>

                                    @error('rnc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- class_tutor --}}
                            <div class="row mb-3">
                                <label for="class_tutor"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Asignatura a impartir') }}</label>

                                <div class="col-md-6">
                                    <select name="class_tutor" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la asignatura del maestro</option>
                                        {{-- @foreach ($tutorClass as $tutorClasses)
                                            <option value="{{ $tutorClasses->id }}">
                                                {{ $tutorClasses->name }}</option>
                                        @endforeach --}}

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Agregar maestro') }}
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
