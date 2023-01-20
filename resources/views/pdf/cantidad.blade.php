<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<body>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Cantidad de citas por especialidad</span>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> Back</a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    {{-- <th>No</th> --}}

                                    <th>Nombre</th>
                                    {{-- <th>Creadas</th> --}}
                                    <th>Agendadas</th>
                                    <th>En proceso</th>
                                    <th>Canceladas</th>
                                    <th>Atendidas</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especialidades as $especialidad)
                                    <tr>
                                        <td>{{ $especialidad->nombre }}</td>

                                        {{-- <td>{{$especialidad->citas()->where("estado",0)->count()}}</td> --}}
                                        <td>{{ $especialidad->citas()->where("estado",1)->count() }}</td>

                                        <td>{{$especialidad->citas()->where("estado",2)->count()}}</td>
                                        <td>{{$especialidad->citas()->where("estado",3)->count()}}</td>
                                        <td>{{$especialidad->citas()->where("estado",4)->count()}}</td>
                                        <td>{{$especialidad->citas()->count()}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- @foreach ($especialidades as $especialidad)
                        {{$especialidad->nombre}}-{{$especialidad->citas()->where("estado",1)->count();}}
                        @endforeach --}}






                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
