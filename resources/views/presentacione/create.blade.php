@extends('template')

@section('titile', 'Crear Presentacion')

@push('css')
    <style>
        #descripcion {
            resize: none;
        }
    </style>
@endpush

@section('content')

    <div class="container-fluid px-4">

        <!-- Page Heading -->

        <h1 class="mt-4 text-center">Crear presentaciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('presentaciones.index') }}">Presentaciones</a></li>
            <li class="breadcrumb-item active">Crear presentacion</li>

        </ol>

        <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
            <form action="{{ route('presentaciones.store') }}" method="post">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"
                            value="{{ old('nombre') }}" placeholder="Escribe tu nombre aqui:" required>
                        @error('nombre')
                            <small class="text-danger">{{'*' . $message }}</small>

                        @enderror
                        <style>
                            input:placeholder-shown {
                                border: solid 2px red;
                            }

                            input:valid {
                                border: solid 2px #7FFFD4;
                            }
                        </style>

                    </div>

                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion') }}</textarea>
                        @error('nombre')
                            <small class="text-danger">{{'*' . $message }}</small>

                        @enderror


                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Guardar presentacion</button>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection

@push('js')

@endpush