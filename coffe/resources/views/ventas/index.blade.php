@extends('layouts.app')
@section('title', 'Coffe-Konecta - Comprar producto')

@section('content')
    @inject('productos', 'App\Models\Product')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ url('/') }}">

                            Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">

                        Comprar producto
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.ventas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select name="id" class="form-control @error('name') is-invalid @enderror" id="product-select">
                                <option value="">Seleccione un Producto</option>
                                @foreach ($productos->get() as $index => $producto)
                                    @if (!$producto->stock == 0)
                                        <option value="{{ $producto->id }}">
                                            {{ $producto->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="number" type="number" class="form-control mt-2 @error('number') is-invalid @enderror"
                                name="number" value="{{ old('number') }}" placeholder="Cantidad">

                            @error('number')
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
