@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Actualizar maestro') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teachers.update', ['id' => $teacher->id]) }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $teacher->name }}"
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
                                    <input id="name" type="text" value="{{ $teacher->surname }}"
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
                                    <input id="rnc" type="text" value="{{ $teacher->RNC }}"
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
                                    <select name="subject_id" class="form-select" aria-label="Default select example">
                                        <option>Selecciona la asignatura del maestro</option>
                                        @foreach ($subject as $subjects)
                                            <option selected value="{{ $subjects->id }}">
                                                {{ $subjects->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Actualizar maestro') }}
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
