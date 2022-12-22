@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ver rol y usuarios</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                        <div class="form-group">
                            <strong>Guard:</strong>
                            {{ $role->guard_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Permisos</span>
                        </div>

                    </div>

                    <div class="card-body">
                        <input type="hidden" name="rol" id="rol" value="{{$role->id}}">
                        @foreach ($permisos as $permiso)
                        @if ($role->hasPermissionTo($permiso->name))
                        <div class="custom-control custom-switch">
                            <input onchange="guardar({{$permiso->id}})" type="checkbox" checked class="custom-control-input" id="permiso{{$permiso->id}}">
                            <label class="custom-control-label" for="permiso{{$permiso->id}}">{{$permiso->name}}</label>
                        </div>
                        @else
                        <div class="custom-control custom-switch">
                            <input onchange="guardar({{$permiso->id}})" type="checkbox" class="custom-control-input" id="permiso{{$permiso->id}}">
                            <label class="custom-control-label" for="permiso{{$permiso->id}}">{{$permiso->name}}</label>
                        </div>
                        @endif

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

    @section('css')

    @stop

    @section('js')
        <script>
        function guardar(idPermiso) {
            let valor= $("#permiso"+idPermiso).prop('checked');
            let rol = $('#rol').val();
            let route = "{{route('rol.permiso')}}";
            $.ajax({
                url:route,
                type:'GET',
                data:{
                    'idrol':rol,
                    'idpermiso':idPermiso,
                    'valor':valor,
                },
                success:function(response){
                    console.log(response);
                }
            });
        }
        </script>
    @stop


