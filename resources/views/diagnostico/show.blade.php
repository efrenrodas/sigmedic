@extends('layouts.app')

@section('template_title')
    {{ $diagnostico->name ?? 'Show Diagnostico' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Diagnostico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('diagnosticos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $diagnostico->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Diagnostico:</strong>
                            {{ $diagnostico->diagnostico }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cita:</strong>
                            {{ $diagnostico->id_cita }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $diagnostico->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
