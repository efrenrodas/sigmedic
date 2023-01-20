<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Especialidade;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function citasesp()
    {
        #0 creada
        #1 agendada
        #2 procesp
        #3 cancelada
        #4 finalizada
        $especialidades = Especialidade::where('estado','=',1)->get();

        return view('reportes.especialidad',compact('especialidades'));

    }
    public function dameMedicos($rol='medico')
    { //  $tipo='pacientes';
     //   $tipoUser==''?$tipo='paciente':$tipo=$tipoUser;
       # $tipo=$request['tipo'];
        $users= User::whereHas("roles", function($q) use ($rol){ $q->where("name", $rol); })->paginate();

        //
        return view('reportes.medico',compact('users','rol'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        # code...
    }
    public function dameCitas()
    {
       # code...
        #0 creada
        #1 agendada
        #2 procesp
        #3 cancelada
        #4 finalizada
        $meses=array(
            1=>'enero',
            2=>'Febrero',
            3=>'Marzo',
            4=>'Abril',
            5=>'Mayo',
            6=>'Junio',
            7=>'Julio',
            8=>'Agosto',
            9=>'Septiembre',
            10=>'Octubre',
            11=>'Noviembre',
            12=>'Diciembre'
        );
       # $citas=Cita::whereYear('created_at','=','2023')->get();
       $citasMeses=[];
        foreach ($meses as $key=>$mes) {
            $creadas = Cita::whereMonth("created_at",'=',$key)->where('estado','=','0')->count();
            $agenda = Cita::whereMonth("created_at",'=',$key)->where('estado','=','1')->count();
            $proceso = Cita::whereMonth("created_at",'=',$key)->where('estado','=','2')->count();
            $cancelado = Cita::whereMonth("created_at",'=',$key)->where('estado','=','3')->count();
            $finalizada = Cita::whereMonth("created_at",'=',$key)->where('estado','=','4')->count();
            $total = Cita::whereMonth("created_at",'=',$key)->count();

            $citasMeses[$key]['mes']=$mes;
            $citasMeses[$key]['creadas']=$creadas;
            $citasMeses[$key]['agendadas']=$agenda;
            $citasMeses[$key]['proceso']=$proceso;
            $citasMeses[$key]['cancelado']=$cancelado;
            $citasMeses[$key]['finalizada']=$finalizada;
            $citasMeses[$key]['total']=$total;

        }
       //$mis= Cita::whereMonth("updated_at",'=','1')->get();
      // return response()->json($citasMeses);
        return view('reportes.mes',compact('citasMeses'));
        # code...
        #citas()->where("MONTH(created_at)",1)->count()
    }
    public function citaspdf()
    {
        $especialidades = Especialidade::where('estado','=',1)->get();

        #return view('pdf.cantidad',compact('especialidades'));
        $pdf=PDF::loadView('pdf.cantidad',compact('especialidades'));
        $pdf->set_option('margin-left', 1);
        $pdf->set_option('margin-right', 5);
        $pdf->set_option('margin-top', 1);
        $pdf->set_option('margin-bottom', 1);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('especialidades.pdf');

        // return view('cita.paciente', compact('citas'))
        //     ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }
    public function medicitaspdf()
    {
        $rol='medico';
      #  $especialidades = Especialidade::where('estado','=',1)->get();
        $users= User::whereHas("roles", function($q) use ($rol){ $q->where("name", $rol); })->paginate();

        #return view('pdf.cantidad',compact('especialidades'));
        $pdf=PDF::loadView('pdf.medicos',compact('users','rol'));
        $pdf->set_option('margin-left', 1);
        $pdf->set_option('margin-right', 5);
        $pdf->set_option('margin-top', 1);
        $pdf->set_option('margin-bottom', 1);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('medicos_citas.pdf');

        // return view('cita.paciente', compact('citas'))
        //     ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }
    public function citasmes()
    {
         # code...
        #0 creada
        #1 agendada
        #2 procesp
        #3 cancelada
        #4 finalizada
        $meses=array(
            1=>'enero',
            2=>'Febrero',
            3=>'Marzo',
            4=>'Abril',
            5=>'Mayo',
            6=>'Junio',
            7=>'Julio',
            8=>'Agosto',
            9=>'Septiembre',
            10=>'Octubre',
            11=>'Noviembre',
            12=>'Diciembre'
        );
       # $citas=Cita::whereYear('created_at','=','2023')->get();
       $citasMeses=[];
        foreach ($meses as $key=>$mes) {
            $creadas = Cita::whereMonth("created_at",'=',$key)->where('estado','=','0')->count();
            $agenda = Cita::whereMonth("created_at",'=',$key)->where('estado','=','1')->count();
            $proceso = Cita::whereMonth("created_at",'=',$key)->where('estado','=','2')->count();
            $cancelado = Cita::whereMonth("created_at",'=',$key)->where('estado','=','3')->count();
            $finalizada = Cita::whereMonth("created_at",'=',$key)->where('estado','=','4')->count();
            $total = Cita::whereMonth("created_at",'=',$key)->count();

            $citasMeses[$key]['mes']=$mes;
            $citasMeses[$key]['creadas']=$creadas;
            $citasMeses[$key]['agendadas']=$agenda;
            $citasMeses[$key]['proceso']=$proceso;
            $citasMeses[$key]['cancelado']=$cancelado;
            $citasMeses[$key]['finalizada']=$finalizada;
            $citasMeses[$key]['total']=$total;

        }
       //$mis= Cita::whereMonth("updated_at",'=','1')->get();
      // return response()->json($citasMeses);
       # return view('reportes.mes',compact('citasMeses'));
        # code...
        #citas()->where("MONTH(created_at)",1)->count()





        $pdf=PDF::loadView('pdf.mes',compact('citasMeses'));
        $pdf->set_option('margin-left', 1);
        $pdf->set_option('margin-right', 5);
        $pdf->set_option('margin-top', 1);
        $pdf->set_option('margin-bottom', 1);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('citas_meses.pdf');

        // return view('cita.paciente', compact('citas'))
        //     ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }
}
