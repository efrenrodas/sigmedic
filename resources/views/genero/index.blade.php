@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Géneros </h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Género') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('generos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										{{-- <th>Estado</th> --}}

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($generos as $genero)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $genero->nombre }}</td>
											{{-- <td>{{ $genero->estado }}</td> --}}

                                            <td>
                                                <form action="{{ route('generos.destroy',$genero->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('generos.show',$genero->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('generos.edit',$genero->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $generos->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop

