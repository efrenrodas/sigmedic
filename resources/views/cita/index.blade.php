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
                        <div id="wrapper">
                            <!-- Calendar element -->
                            <div id="events-calendar" data-language="es" ></div>
                            <!-- Events -->
                            <div id="events"></div>
                            <!-- Clear -->
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        {{-- fin calendario --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
<style>
    html, body {
        font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    }
    .description {
        text-align: center;
        padding-bottom: 40px;
    }
    .jsCalendar.clean-theme tbody td.jsCalendar-previous, .jsCalendar.clean-theme tbody td.jsCalendar-next {
        color: #000;
        opacity: 0.2;
    }
    #wrapper {
        margin: 0 auto;
        width: 800px;
        box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);
    }
    #wrapper .jsCalendar table {
        box-shadow: none;
    }
    .clear {
        clear: both;
    }
    #events-calendar {
        float: left;
        width: 450px;
    }
    #events {
        float: left;
        width: 300px;
        margin: 10px 20px 10px 5px;
    }
    #events .title {
        padding: 5px 0px;
        text-align: center;
        font-weight: bold;
        border-bottom: 1px solid rgba(0, 0, 0, 0.4);
    }
    #events .subtitle {
        padding: 5px 0px;
        font-size: 14px;
        text-align: center;
        color: #888;
    }
    #events .list {
        height: 250px;
        overflow-y: auto;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }
    #events .list .event-item {
        line-height: 24px;
        min-height: 24px;
        padding: 2px 5px;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }
    #events .list .event-item .close {
        font-family: Tahoma, Geneva, sans-serif;
        font-weight: bold;
        font-size: 12px;
        color: #000;
        border-radius: 8px;
        height: 16px;
        width: 80px;
        line-height: 12px;
        text-align: center;
        float: right;
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 0px;
        margin: 5px;
        display: block;
        overflow: hidden;
        background: #09eb1c;
        cursor: pointer;
    }
    #events .action {
        text-align: right;
    }
    #events .action input {
        padding: 0px 5px;
        font-size: 12px;
        margin: 10px 5px;
        border: 1px solid #999999;
        height: 28px;
        line-height: 28px;
        width: 120px;
        background: #f8f8f8;
        color: black;
        cursor: pointer;
        transition: all 0.2s;
    }
    #events .action input:hover {
        background: #eee;
        border: 1px solid #000;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2);
    }
    .version {
        font-size: 12px;
        width: 800px;
        margin: 0 auto;
        text-align: right;
    }
</style>
@stop

@section('js')
<!-- jsCalendar v1.4.4 Javascript and CSS from unpkg cdn -->
<script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.min.js" integrity="sha384-0LaRLH/U5g8eCAwewLGQRyC/O+g0kXh8P+5pWpzijxwYczD3nKETIqUyhuA8B/UB" crossorigin="anonymous"></script>
<script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.lang.es.js"></script>

<link rel="stylesheet" href="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.min.css" integrity="sha384-44GnAqZy9yUojzFPjdcUpP822DGm1ebORKY8pe6TkHuqJ038FANyfBYBpRvw8O9w" crossorigin="anonymous">
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
                   ' <a onclick="seleccionar('+value.user.id+')"class="btn btn-primary">Sacar cita </a>'+
                '</div>'+
                '</div>'
            );
        });

    }
    $(document).ready(function(){
        var currentDate = new Date();
      //  refreshEvents(currentDate);
      //  showEvents(currentDate);
    });
    function seleccionar(id) {
        console.log(id);
        idMedico=id;
     //   console.log({idUser});
    }


</script>
<script type="text/javascript">
    // Get elements
    var elements = {
        // Calendar element
        calendar : document.getElementById("events-calendar"),
        // Input element
        events : document.getElementById("events")
    }

    // Create the calendar
    elements.calendar.className = "clean-theme";
    var calendar = jsCalendar.new(elements.calendar);

    // Create events elements
    elements.title = document.createElement("div");
    elements.title.className = "title";
    elements.events.appendChild(elements.title);
    elements.subtitle = document.createElement("div");
    elements.subtitle.className = "subtitle";
    elements.events.appendChild(elements.subtitle);
    elements.list = document.createElement("div");
    elements.list.className = "list";
    elements.events.appendChild(elements.list);
    elements.actions = document.createElement("div");
    elements.actions.className = "action";
    elements.events.appendChild(elements.actions);
    // elements.addButton = document.createElement("input");
    // elements.addButton.type = "button";
    // elements.addButton.value = "Add";
    // elements.actions.appendChild(elements.addButton);

    var events = {};
    var date_format = "DD/MM/YYYY";
    var current = null;


    var refreshEvents = function(date){
        // Date string
       // date=null;
     //   alert(date);
        var id = jsCalendar.tools.dateToString(date, date_format, "es");
        // Set date
        current = new Date(date.getTime());
        // Set title
        elements.title.textContent = id;
        // Clear old events
        elements.list.innerHTML = "";
        // Add events on list
        if (events.hasOwnProperty(id) && events[id].length) {
            // Number of events
            elements.subtitle.textContent = events[id].length + " " + ((events[id].length > 1) ? "citas disponibles" : "cita disponible");
        }
        else {
            elements.subtitle.textContent = "No hay citas disponibles";
        }
    };

    var showEvents = function(date){
        // Skip weekends
        if (date.getDay() === 0 || date.getDay() === 6) {
            refreshEvents(new Date());
            return;
        }
       // Date string
        var id = jsCalendar.tools.dateToString(date, date_format, "es");

        // If the date does not exist in the events object, create an empty array
        if (!events.hasOwnProperty(id)) {
            events[id] = [];

            // Set the current date to the start of the day
            var current = new Date(date.getTime());
            current.setHours(8, 0, 0, 0);

            // Set the end date to the end of the day
            var end = new Date(date.getTime());
            end.setHours(18, 0, 0, 0);

            // Create the events
            while (current < end) {
                // Create the event object
                var event = {
                name: "Cita a las " + current.toLocaleTimeString()
                };

                // Add the event to the array
                events[id].push(event);
                // Add 30 minutes to the current date
                current.setMinutes(current.getMinutes() + 30);
            }
        }

        // Set date
        current = new Date(date.getTime());

        // Set title
        elements.title.textContent = id;

        // Clear old events
        elements.list.innerHTML = "";

        // Add events on list
        // Number of events
        elements.subtitle.textContent = events[id].length + " " + ((events[id].length > 1) ? "Citas disponibles" : "Cita disponible");

        var div;
        var close;
        // For each event
        for (var i = 0; i < events[id].length; i++) {
            div = document.createElement("div");
            div.className = "event-item";
            div.textContent = (i + 1) + ". " + events[id][i].name;
            elements.list.appendChild(div);
            var button = document.createElement("button");
            button.className = "close";
            button.textContent = "Agendar";
            div.appendChild(button);
            button.addEventListener("click", function() {
                agendar();
            });
        }
    };


    // Show current date events
    refreshEvents(new Date());

    // Add events
    calendar.onDateClick(function(event, date){
        // Update calendar date
        calendar.set(date);
        // Show events
        showEvents(date);
    });


    function agendar() {
        alert('asd')
    }

</script>
@stop
