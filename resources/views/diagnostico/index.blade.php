@extends('layouts.app')

@section('template_title')
    Diagnostico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Diagnostico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('diagnosticos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tipo</th>
										<th>Diagnostico</th>
										<th>Id Cita</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosticos as $diagnostico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diagnostico->tipo }}</td>
											<td>{{ $diagnostico->diagnostico }}</td>
											<td>{{ $diagnostico->id_cita }}</td>
											<td>{{ $diagnostico->estado }}</td>

                                            <td>
                                                <form action="{{ route('diagnosticos.destroy',$diagnostico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('diagnosticos.show',$diagnostico->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('diagnosticos.edit',$diagnostico->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $diagnosticos->links() !!}
            </div>
        </div>
    </div>
@endsection
