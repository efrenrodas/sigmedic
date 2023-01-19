@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modulo de reportes</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Selecciona el reporte a generar</span>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> Back</a>
                        </div> --}}
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong> Reporte de cantidad de citas por especialidad</strong>
                            <a class="btn btn-sm btn-primary " href="{{route('reporte.citas.especialidad')}}"><i class="fa fa-chevron-right"></i></a>


                        </div>

                        <div class="form-group">
                            <strong>Reporte de médicos con citas atendidas</strong>
                            <a class="btn btn-sm btn-primary " href="{{route('reporte.citas.medico')}}"><i class="fa fa-chevron-right"></i></a>

                        </div>
                        <div class="form-group">
                            <strong>Reporte de citas atendidas por mes</strong>
                            <a class="btn btn-sm btn-primary " href="{{route('reporte.citas.mes')}}"><i class="fa fa-chevron-right"></i></a>

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

