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
    <h2>Reporte de citas atendidas por mes</h2>
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                {{-- <th>No</th> --}}

                <th>Mes</th>
                <th>Creadas</th>
                <th>Agendadas</th>
                <th>En proceso</th>
                <th>Canceladas</th>
                <th>Atendidas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($citasMeses as $citas)
                <tr>
                    <td>{{ $citas['mes'] }}</td>

                    <td>{{ $citas['creadas'] }}</td>
                    <td>{{ $citas['agendadas'] }}</td>
                    <td>{{ $citas['proceso'] }}</td>
                    <td>{{ $citas['cancelado'] }}</td>
                    <td>{{ $citas['finalizada'] }}</td>
                    <td>{{ $citas['total'] }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
