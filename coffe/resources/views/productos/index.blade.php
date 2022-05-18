@extends('layouts.app')
@section('title', 'Coffe-Konecta - Lista de productos')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">

                            Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">

                        Lista de productos
                    </li>
                </ol>
            </nav>
            <a href="{{ route('admin.productos.create') }}" class="btn btn-success">
                Agregar Producto
            </a>
            <table class="table table-hover mt-2">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Producto</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Disponibles</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <th scope="row">{{ $producto->name }}</th>
                            <td>{{ $producto->ref }}</td>
                            <td>$ {{ $producto->price }}</td>
                            <td>{{ $producto->weight }}</td>
                            <td>{{ $producto->category }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <a href="{{ url('admin/productos/' . $producto->id . '/edit') }}"
                                    class="btn btn-sm btn-info">Editar</a>
                                <form action="{{ url('admin/productos/' . $producto->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay productos para mostrar</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
