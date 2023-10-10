@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Editar alumnos') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.students', ['id' => $student->id]) }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $student->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- surnamne --}}
                            <div class="row mb-3">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="surnamne" type="text" value="{{ $student->surname }}"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- age --}}
                            <div class="row mb-3">
                                <label for="age"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" value="{{ $student->age }}"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" required autocomplete="age" autofocus>

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- sex --}}
                            <div class="row mb-3">
                                <label for="sex"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                                <div class="col-md-6">
                                    <input id="sex" type="text" value="{{ $student->sex }}"
                                        class="form-control @error('sex') is-invalid @enderror" name="sex"
                                        value="{{ old('sex') }}" required autocomplete="sex" autofocus>

                                    @error('sex')
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
                                        <option>Selecciona el maestro</option>
                                        @foreach ($teacher as $teachers)
                                            <option selected value="{{ $teachers->id }}">
                                                {{ $teachers->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- tutor_id --}}
                            <div class="row mb-3">
                                <label for="class_tutor"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Clasificacion del tutor/padre') }}</label>

                                <div class="col-md-6">
                                    <select name="class_tutor" class="form-select" aria-label="Default select example">
                                        <option>Selecciona el tutor</option>
                                        @foreach ($tutor as $tutors)
                                            <option selected value="{{ $tutors->id }}">
                                                {{ $tutors->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Actualizar estudiante') }}
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
