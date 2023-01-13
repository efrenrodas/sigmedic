<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Genero;
use App\Models\Medicosespecialidade;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // return response()->json($request);
        $rol=$request['tipo'];
        $user = new User();
        $roles=Role::all();
        $generos=Genero::pluck('nombre','id');
     #   return response()->json($roles);
        return view('user.create', compact('user','roles','rol','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       # request()->validate(User::$rules);Hash::make($data['password']),

     $rol=$request['rol'];
        $password=$request['password'];
        $request['password']=Hash::make($password);
     //   return response()->json($request);
        $user = User::create($request->all());
        $user->assignRole($rol);
       switch ($rol) {
        case 'medico':
           ## $this->dameMedicos();
           return redirect()->route('dame.medicos');
            break;
        case 'paciente':
           ## $this->damePacientes();
           return redirect()->route('dame.pacientes');
            break;

        default:
            # code...
            break;
       }
        // return redirect()->route('users.index')
        //     ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $medicoespe=Medicosespecialidade::where('id_medido','=',$id)->get();
        $especialidades=Especialidade::where('estado','=',1)->get();
       // return response()->json($especialidades);
        return view('user.ver', compact('user','medicoespe','especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $rol='';
        $generos=Genero::pluck('nombre','id');
        return view('user.edit', compact('user','rol','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      #  request()->validate(User::$rules);
        $password=$request['password'];
        $request['password']=Hash::make($password);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
    public function damePacientes($rol='paciente')
    { //  $tipo='pacientes';
     //   $tipoUser==''?$tipo='paciente':$tipo=$tipoUser;
       # $tipo=$request['tipo'];
        $users= User::whereHas("roles", function($q) use ($rol){ $q->where("name", $rol); })->paginate();

        //return json_encode($users);
        return view('user.index',compact('users','rol'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        # code...
    }

    public function dameMedicos($rol='medico')
    { //  $tipo='pacientes';
     //   $tipoUser==''?$tipo='paciente':$tipo=$tipoUser;
       # $tipo=$request['tipo'];
        $users= User::whereHas("roles", function($q) use ($rol){ $q->where("name", $rol); })->paginate();

        //return json_encode($users);
        return view('user.pacientes',compact('users','rol'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        # code...
    }
    public function verpacientes($id)
    {
        # code...
        $user=User::find($id);


       // return response()->json($especialidades);
        return view('user.show', compact('user'));

    }
    public function fotoMedico(Request $request)
    {
      //  return response()->json($request);
        $user=User::find($request['id_medico']);
        if ($request->hasFile('imagen')) {
            Storage::delete('public/'.$user->imagen);
           $user->imagen=$request->file('imagen')->store('medicos','public');
           $user->save();
        }
        return redirect()->back();
    }
}
