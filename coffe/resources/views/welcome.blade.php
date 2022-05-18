@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <img src="{{ asset('imgs/bg-dashboard.svg') }}" width="300px" class="my-2 img-top-card">
                <div class="card-header text-center">
                    <h4>
                        <i class="fa fa-clipboard-list"></i>
                        Bienvenido
                    </h4>
                    <small>
                        <i class="fas fa-user-ninja"></i> Administrador
                    </small>
                </div>

                <div class="card-body row">
                    <div class="col-md-6 mt-5">
                        <div class="card" style="height: 298px">
                            <img src="{{ asset('imgs/breakfast.svg') }}" width="240px" height="210px"
                                class="my-2 img-top-card">
                            <div class="card-body">
                                <a href="{{ route('admin.productos.index') }}"
                                    class="btn btn-block btn btn-block btn-primary">
                                    Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <img src="{{ asset('imgs/credit_card.svg') }}" width="230px" class="my-2 img-top-card">
                            <div class="card-body">
                                <a href="{{ route('admin.ventas.index') }}" class="btn btn-block btn-primary">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
