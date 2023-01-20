<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita medica agendada</title>
</head>
<body>
    <div style="font-size: 5px;text-align: center;">
       Cita medica agendada
    </div>
   
    <div style="font-size: 5px; font-weight: bold;">
        Medico : {{$cita->medico->name}}
    </div>
    <div style="font-size: 5px;  margin-top: 2px;">
        Fecha: {{ date('Y-m-d', strtotime($cita->horario)) }}
    </div>
    <div style="font-size: 5px;  margin-top: 2px;">
        Hora: {{ date('H:i:s', strtotime($cita->horario)) }}
    </div>
    <p style="font-size: 7px;  margin-top: 2px;">
        Por favor asistir con 30 minutos de anticipacion
    </p>
</body>
</html>