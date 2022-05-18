@extends('layouts.app')
@section('title', 'Coffe-Konecta - Agregar producto')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">

                            Inicio</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.productos.index') }}">

                            Lista de productos</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">

                        Editar Producto
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/productos/' . $producto->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input id="name" type="text" class="form-control mt-2 @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $producto->name) }}" placeholder="Producto" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="ref" type="number" class="form-control mt-2 @error('ref') is-invalid @enderror"
                                name="ref" value="{{ old('ref', $producto->ref) }}" placeholder="Referencia">

                            @error('ref')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="price" type="number" class="form-control mt-2 @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price', $producto->price) }}" placeholder="Precio $">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="weight" type="number" class="form-control mt-2 @error('weight') is-invalid @enderror"
                                name="weight" value="{{ old('weight', $producto->weight) }}" placeholder="Peso en gramos">

                            @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="category" id="category"
                                class="form-control mt-2 @error('category') is-invalid @enderror">
                                <option value="">Selecciona una categoría</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Comestibles">Comestibles</option>
                                <option value="Enlatados">Enlatados</option>
                                <option value="Onces">Onces</option>
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="stock" type="number" class="form-control mt-2 @error('stock') is-invalid @enderror"
                                name="stock" value="{{ old('stock', $producto->stock) }}" placeholder="Cantidad">

                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block text-uppercase mt-2">
                                Agregar
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
