@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ver </h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $user->identificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de naciemiento:</strong>
                            {{ $user->fechaNaciemiento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $user->genero->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad de residencia:</strong>
                            {{ $user->ciudadResidencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop

