@extends('template')

@section('title', 'Crear Categoria')

@push('css')

<style>
    #descripcion{
        resize: none;
    }
</style>

@endpush

@section('content')

        <!-- Main Content -->
        <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="mt-4 text-center">Crear Categorias</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="{{ route('panel') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('categorias.index') }}">Categorias</a></li>
                            <li class="breadcrumb-item active">Crear Categoria</li>
                        </ol>

                        <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
                            <form action="{{ route('categorias.store') }}" method="POST"><!-- Formulario para crear una nueva categoría, el route 'categorias.store' maneja el almacenamiento de la categoría -->
                                @csrf <!-- Directiva de Blade para incluir el token CSRF, necesario para la seguridad del formulario -->
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                                        @error('nombre')
                                        <small class="text-danger">{{'*'.$message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="descripcion" class="form-label">Descripcion:</label>
                                        <textarea name="descripcion" class="form-control" id="descripcion" rows="10">{{ old('descripcion') }}</textarea>
                                        @error('descripcion')
                                        <small class="text-danger">{{'*'.$message }}</small>
                                        @enderror

                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="#" class="btn btn-secondary">Cancelar</a>

                                    </div>
                                </div>
                            </form>




                        </div>
                    

                </div>
        </div>

@endsection

@push('js')

@endpush