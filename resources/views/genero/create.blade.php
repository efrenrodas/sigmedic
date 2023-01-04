@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Genero</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Género</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('generos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('genero.form')

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

