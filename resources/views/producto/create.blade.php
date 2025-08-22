@extends('template')

@section('title','Crear producto')

@push('css')
<style>
    #descripcion{
        resize: none;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js">

</script>


@endpush

@section('content')
<div class="container-fluid px-4">

        <!-- Page Heading -->

        <h1 class="mt-4 text-center">Crear prodcuto</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('productos.index') }}">Productos</a></li>
            <li class="breadcrumb-item active">Crear producto</li>

        </ol>

        <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row g-3">

                <!--Codigo-->
                <div class="col-md-6 mb-2">

                <label for="codigo_pro" class="form-label">Código:</label>
                <input type="text" name="codigo_pro" id="codigo_pro" class="form-control" value="{{ old('codigo_pro') }}">
                @error('codigo_pro')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror

                </div>

                <!--Nombre-->
                <div class="col-md-6 mb-2">

                <label for="nombre_pro" class="form-label">Nombre:</label>
                <input type="text" name="nombre_pro" id="nombre_pro" class="form-control" value="{{ old('nombre_pro') }}">
                @error('nombre_pro')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror

                </div>

                <!--Descripcion-->
                <div class="col-md-12 mb-2">

                <label for="descripcion" class="form-label">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="form-control" value="{{ old('descripcion') }}"></textarea>
                @error('descripcion')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror

                </div>

                <!--Imagen-->
                <div class="col-md-6 mb-2">

                <label for="imagen_path" class="form-label">Imagen:</label>
                <input type="file" name="imagen_path" id="imagen_path" class="form-control" accept="Image/*" value="{{ old('imagen_path') }}">
                @error('imagen_path')
                <small class="text-danger">{{ '*'.$message}}</small>
                @enderror

                </div>


                <!--Marca-->
                <div class="col-md-6 mb-2">

                <label for="marca_id" class="form-label">Marca:</label>
                <select data-size="5" title="Selecione un marca" data-live-search="true" name="marca_id" id="marca_id" class="form-control selectpicker show-tick" >
                    @foreach ($marcas as $item)

                    <option value="{{ $item->id }}" {{ old('marca_id') == $item->id ? 'selected' : '' }}>{{ $item->nombre }}

                    </option>
                    
                    @endforeach

                </select>
                @error('marca_id')
                <small class="text-danger">{{ '*'.$message}}</small>
                @enderror

                </div>


                <!--Presentacion-->
                <div class="col-md-6 mb-2">

                <label for="presentacione_id" class="form-label">Presentacion:</label>
                <select data-size="5" title="Seleccione una presentacion" data-live-search="true" name="presentacione_id" id="presentacione_id" class="form-control selectpicker show-tick">
                    @foreach ($presentaciones as $item)

                    <option value="{{ $item->id }}" {{ old('presentacione_id') == $item->id ? 'selected' : '' }}>{{ $item->nombre }}

                    </option>
                    
                    @endforeach

                </select>
                @error('presentacione_id')
                <small class="text-danger">{{ '*'.$message}}</small>
                @enderror

                </div>


                <!--Categoria-->
                <div class="col-md-6 mb-2">

                <label for="categorias" class="form-label">Categorias:</label>
                <select data-size="5" title="Seleccione las categorias" data-live-search="true" name="categorias[]" id="categorias" class="form-control selectpicker show-tick" multiple>
                    @foreach ($categorias as $item)

                    <option value="{{ $item->id }}" {{ (in_array($item->id , old('categorias',[]))) ? 'selected' : '' }}>{{ $item->nombre }}

                    </option>
                    
                    @endforeach

                </select>
                @error('categorias')
                <small class="text-danger">{{ '*'.$message}}</small>
                @enderror

                </div>


                <!--Botones-->
                <div class="col-12 text-center" >
                    <button type="submit" class="btn btn-primary">Guardar</button>




                </div>



                


                

            </div>

            </form>
        </div>
</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
@endpush