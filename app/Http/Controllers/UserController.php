<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
     #   return response()->json($roles);
        return view('user.create', compact('user','roles','rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       # request()->validate(User::$rules);
     //  return response()->json($request);
     $rol=$request['rol'];
        $user = User::create($request->all());
        $user->assignRole($rol);
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
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

        return view('user.show', compact('user'));
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

        return view('user.edit', compact('user'));
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

        $user->update($request->except('password'));

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
        return view('user.pacientes',compact('users','rol'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
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
}
