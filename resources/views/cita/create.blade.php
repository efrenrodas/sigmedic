@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agenda</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Citas para el medico</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('citas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cita.form')

                        </form>
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
