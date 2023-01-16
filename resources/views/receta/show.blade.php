@extends('layouts.app')

@section('template_title')
    {{ $receta->name ?? 'Show Receta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Receta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Medicamento:</strong>
                            {{ $receta->medicamento }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $receta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cita:</strong>
                            {{ $receta->id_cita }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
