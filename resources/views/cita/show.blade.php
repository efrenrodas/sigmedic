@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ver cita</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('citas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $cita->horario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Paciente:</strong>
                            {{ $cita->id_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Medico:</strong>
                            {{ $cita->id_medico }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cita->estado }}
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
