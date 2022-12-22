@extends('layouts.app')

@section('template_title')
    {{ $especialidade->name ?? 'Show Especialidade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Especialidade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('especialidades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $especialidade->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $especialidade->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
