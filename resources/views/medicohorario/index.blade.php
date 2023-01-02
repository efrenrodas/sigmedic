@extends('layouts.app')

@section('template_title')
    Medicohorario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medicohorario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medicohorarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Hora</th>
										<th>Id Medico</th>
										<th>Estado</th>
										<th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicohorarios as $medicohorario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $medicohorario->hora }}</td>
											<td>{{ $medicohorario->id_medico }}</td>
											<td>{{ $medicohorario->estado }}</td>
											<td>{{ $medicohorario->observacion }}</td>

                                            <td>
                                                <form action="{{ route('medicohorarios.destroy',$medicohorario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medicohorarios.show',$medicohorario->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medicohorarios.edit',$medicohorario->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $medicohorarios->links() !!}
            </div>
        </div>
    </div>
@endsection
