@extends('layouts.app')

@section('template_title')
    {{ $medicosespecialidade->name ?? 'Show Medicosespecialidade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medicosespecialidade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicosespecialidades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Medido:</strong>
                            {{ $medicosespecialidade->id_medido }}
                        </div>
                        <div class="form-group">
                            <strong>Id Especialidad:</strong>
                            {{ $medicosespecialidade->id_especialidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $medicosespecialidade->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $medicosespecialidade->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
