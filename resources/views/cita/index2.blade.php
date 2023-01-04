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
                           <button onclick="traeMedicos({{$especialidad->id}})" type="button" class="btn btn-outline-primary" style="margin: 5px;">{{$especialidad->nombre}}</button>

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

                    <div id="divMedicos" class="row card-body">

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
                            <div class="description">
                                <div style="font-size: 1.4em;">Citas Medicas</div>
                                <div>Seleccione un dia y una hora</div>
                            </div>
                        </div>
                        {{-- calendario --}}
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div id="horas" class="col-md-5">
    
                            </div>
                        </div>
                        
                        {{-- fin calendario --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
<style>

</style>
@stop

@section('js')

<script>
    var idMedico='0';
    var idUser="{{Auth::id()}}";
    function traeMedicos(idEsp) {
        console.log(idEsp);
       let route="{{route('medesp.med')}}";
       $.ajax({
        type:'GET',
        url:route,
        data:{
            'idEspecialidad':idEsp,
        },
        success:function(response){
          //  console.log(response)
          llenaMedicos(response.medicos)
        }
       });
     //  crearCitas();
    }
    function llenaMedicos(medicos) {
        $('#divMedicos').empty();
        $.each(medicos,function(index,value){
            let foto="{{asset('storage')}}/"+value.user.imagen
            $('#divMedicos').append(
                '<div class="card" style="max-width: 18rem;margin: 15px;">'+
                    '<img class="card-img-top" src="'+foto+'" alt="Card image cap">'+
                '<div class="card-body">'+
                    '<h5 class="card-title">'+value.nombre+'</h5>'+
                    '<p class="card-text">$'+value.precio+'</p>'+
                   ' <a onclick="seleccionar('+value.user.id+')"class="btn btn-primary">Seleccionar </a>'+
                '</div>'+
                '</div>'
            );
        });

    }

    $('#fecha').change(function() {
        var fecha = $(this).val();
        console.log(fecha);
        //agregar las citas de ese dia 
        cargarCitas(fecha);
    });

    function cargarCitas(fecha) {
        let start = '08:00';
        let end = '18:00';

        // Dividimos la hora de inicio y la hora final en horas y minutos
        let startHour = start.split(':')[0];
        let startMinute = start.split(':')[1];
        let endHour = end.split(':')[0];
        let endMinute = end.split(':')[1];

        // Vaciamos el contenedor de botones
        $('#horas').empty();

        // Iteramos en intervalos de media hora mientras la hora de inicio sea menor que la hora final
        while (horaMayor(start, end)) {
            // Añadimos un botón al contenedor con la hora y los minutos en la etiqueta <span>
            $('#horas').append(
            `<button type="button" class="btn btn-outline-success">
                <span>${startHour}:${startMinute}</span>
            </button>`
            );
            console.log(startHour);
            // Incrementamos la hora de inicio en media hora
            startMinute += 30;
            if (startMinute >= 60) {
            startHour++;
            startMinute -= 60;
            }
        }
    }


  
function horaMayor(hora1, hora2) {
  let hora1Hour = hora1.split(':')[0];
  let hora1Minute = hora1.split(':')[1];
  let hora2Hour = hora2.split(':')[0];
  let hora2Minute = hora2.split(':')[1];

  if (hora1Hour > hora2Hour) {
    return true;
  } else if (hora1Hour === hora2Hour && hora1Minute > hora2Minute) {
    return true;
  } else {
    return false;
  }
}

   



</script>

@stop
