@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Citas</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Seleccionar especialidad') }}
                            </span>
                           
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                      {{-- <select name="especialidades" class="form-control" id="especialidades"> --}}
                       @foreach ($especialidades as $especialidad)
                           {{-- <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option> --}}
                           <button onclick="traeMedicos({{$especialidad->id}})" type="button" class="btn btn-outline-primary">{{$especialidad->nombre}}</button>

                       @endforeach
                      {{-- </select> --}}
                    </div>
                
                </div>
            
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Seleccionar médico') }}
                            </span>
                           
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div id="mostrarMedicos" class="card-body">
                     
                    </div>
                
                </div>
            
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registrar una cita') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('citas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                             </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                           
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
<script>
    function traeMedicos(idEsp) {
       let route="{{route('medesp.med')}}";
       $.ajax({
        type:'GET',
        url:route,
        data:{
            'idEspecialidad':idEsp,
        }
       });
    }
</script>
@stop
