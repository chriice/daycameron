@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Habitaciones Disponibles</h3>
    <div class="row">
        @foreach($habitacionesDisponibles as $habitacion)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $habitacion->nombre }}</h5>
                        <p class="card-text">{{ $habitacion->descripcion }}</p>
                        <a href="#" class="btn btn-primary">Reservar</a>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
