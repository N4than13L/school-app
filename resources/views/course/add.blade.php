@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Cursos</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('course.save') }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Curso') }}</label>

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



                            {{-- course_class --}}
                            <div class="row mb-3">
                                <label for="course_class" class="col-md-4 col-form-label text-md-end">Clasificacion del
                                    curso</label>

                                <div class="col-md-6">
                                    <select name="course_class" class="form-select" aria-label="Default select example"
                                        id="course_class">
                                        <option selected>Clasificacion del curso</option>
                                        @foreach ($course_class as $course_classes)
                                            <option value="{{ $course_classes->id }}">
                                                {{ $course_classes->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Agregar clasificacion de curso') }}
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
