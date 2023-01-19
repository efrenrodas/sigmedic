<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Especialidade;
use App\Models\Examene;
use App\Models\Medicosespecialidade;
use App\Models\Receta;
use App\Models\Sintoma;
use App\Models\User;
use App\Models\Userenfermedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class CitaController
 * @package App\Http\Controllers
 */
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::paginate();
        $especialidades=Especialidade::where('estado','=','1')->get();
        return view('cita.index', compact('citas','especialidades'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $rol="medico";
        $cita = new Cita();
        $medicos= User::whereHas("roles", function($q) use ($rol){ $q->where("name", $rol); })->paginate();
        return view('cita.create', compact('cita','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  return response()->json($request);
        $start=$request['desde'];
        $end=$request['hasta'];
        $medico=$request['id_medico'];
        for ($i=strtotime($start); $i <=strtotime($end) ; $i=$i+1800) {

             // Obtener el día de la semana de la fecha actual del bucle (0 es domingo, 6 es sábado)
            $day = date('w', $i);
            // Obtener la hora de la fecha actual del bucle (en formato 'HH')
            $hour = date('H', $i);
            //obtener los minutos para no pasarse a las 18:30
            $minutes=date('i',$i);
            // Si el día es sábado o domingo, o la hora es menor que 8 o mayor que 18, saltar a la siguiente iteración del bucle
            if ($day == 0 || $day == 6 || $hour < 8 || $hour > 18 ) {
                continue;
            }
            $cita=new Cita();
            $cita->horario=date('Y-m-d H:i:s', $i);
            $cita->id_medico=$medico;
            $cita->estado='0';
            $cita->save();
        }
       // request()->validate(Cita::$rules);

      //  $cita = Cita::create($request->all());
      $citas=Cita::paginate();
        return view('cita.inicio',compact('citas'))->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
        // return redirect()->route('citas.index2')
        //     ->with('success', 'Cita created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        return view('cita.show', compact('cita'));
    }

    public function atender($id)
    {
        $cita = Cita::find($id);
        $userenfermedades=Userenfermedade::where('id_paciente','=',$cita->paciente->id)
        ->paginate();
        $sintomas=Sintoma::where('id_paciente','=',$cita->paciente->id)->where('id_cita','=',$id)->paginate();
        $examenes=Examene::where('id_cita','=',$id)->get();
        $diagnosticos=Diagnostico::where('id_cita','=',$id)->where('tipo','=','presuntivo')->get();

        return view('cita.atender', compact('cita','userenfermedades','sintomas','examenes','diagnosticos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);

        return view('cita.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cita $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        request()->validate(Cita::$rules);

        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);

        $cita->estado='0';
        $cita->save();

        return redirect()->route('paciente.citas')
            ->with('success', 'Cita cancelada correctamente');
    }
    public function crear(Request $request)
    {
        # code...
        $fecha=strtotime($request['fecha']);

        $id=$request['id'];
        $cita=Cita::find($id);
      #  $cita->horario=date("Y-m-d H:i:s", $fecha);
        $cita->id_paciente=$request['paciente'];
        $cita->id_medico=$request['medico'];
        $cita->estado="1";
        $cita->save();

        return response()->json($request);
    }
    public function buscar(Request $request)
    {
        $medico=$request['medico'];

        $fecha=strtotime($request['fecha']);

        $horario=date("Y-m-d H:i:s", $fecha);
        if(Cita::where('id_medico','=',$medico)->where('horario','=',$horario)->count()>0){
            return response()->json('existe');
        }else{
            return response()->json('no');
        }
    }
    public function traer(Request $request)
    {
        $medico=$request['medico'];

        $fecha=$request['fecha'];
        $horaInicio="08:00:00";
        $horaFin="18:00:00";
        $fechaHora=date('Y-m-d H:i:s', strtotime("$fecha $horaInicio"));
        $fin=date('Y-m-d H:i:s',strtotime("$fecha $horaFin"));




        $citas=Cita::where('id_medico','=',$medico)->where('estado','=','0')->whereBetween('horario',[$fechaHora,$fin])->get();
        return response()->json(['citas'=>$citas,'inicio'=>$fechaHora,'fin'=>$fin]);

    }
    public function CitasPaciente()
    {
        $idPaciente=Auth()->id();
        $citas= Cita::where('id_paciente','=',$idPaciente)->paginate();
        $pdf=Pdf::loadView('pdf.agenda');
        $pdf->download('cita.pdf');
       
        return view('cita.paciente', compact('citas'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    public function CitasMedico()
    {
        $idMedico=Auth()->id();
        $citas= Cita::where('id_medico','=',$idMedico)->where('estado','!=','0')->paginate();
       # return response()->json($citas);
        return view('cita.medico', compact('citas'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    public function consulta($id)
    {
        $diagnosticos=Diagnostico::where('id_cita','=',$id)->where('tipo','=','definitivo')->get();
        $receta=Receta::where('id_cita','=',$id)->get();
        return view('cita.consulta',compact('diagnosticos','receta'));
    }

    public function cita()
    {
        $pdf=Pdf::loadView('pdf.agenda');
       return $pdf->download('cita.pdf');
    }
    public function ir($id)
    {
        $cita = Cita::find($id);
        $userenfermedades=Userenfermedade::where('id_paciente','=',$cita->paciente->id)
        ->paginate();
        $sintomas=Sintoma::where('id_paciente','=',$cita->paciente->id)->where('id_cita','=',$id)->paginate();
        $examenes=Examene::where('id_cita','=',$id)->get();
        $diagnosticos=Diagnostico::where('id_cita','=',$id)->where('tipo','=','presuntivo')->get();
        $recetas=Receta::where('id_cita','=',$id)->get();
        return view('cita.consulta', compact('cita','userenfermedades','sintomas','examenes','diagnosticos','recetas'));

       #return response()->json($id);
    }

}
