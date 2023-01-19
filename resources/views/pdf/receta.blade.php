<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div style="font-family: Arial, sans-serif;">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    Dr.{{$cita->medico->name}} - {{$cita->medico->apellidos}}<br>
                    @foreach ($cita->medico->medicoespecialidades as $especialida)
                       {{$especialida->especialidad->nombre}},
                    @endforeach
                </div>
                    <div  style="color: #333;">Paciente : {{$cita->paciente->name}} {{$cita->paciente->apellidos}}</div>
                    <div  style="color: #333;">Cédula : {{$cita->paciente->identificacion}}</div>

                <hr>
                <div>
                <strong> Medicamentos:</strong>
                </div>
                <ul class="list-style">
                    @foreach ($recetas as $receta)
                    <li>{{$receta->medicamento}}</li>

                    @endforeach
                </ul>

            </div>

            <div class="col-md-6">
                <div>
                 <strong>Indicaciones:</strong>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Medicamento</th>
                                <th>Dosis</th>
                                <th>Duración</th>
                                <th>Instrucciones</th>
                                {{-- <th>Notas</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recetas as $receta)
                            <tr>
                                <td>{{ $receta->medicamento }}</td>
                                <td>{{ $receta->dodis }}</td>
                                <td>{{ $receta->duracion }}</td>
                                <td>{{ $receta->instrucciones }}</td>
                                {{-- <td>{{ $receta->notas }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>







    </div>
</body>
</html>

