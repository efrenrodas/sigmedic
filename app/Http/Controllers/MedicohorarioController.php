<?php

namespace App\Http\Controllers;

use App\Models\Medicohorario;
use Illuminate\Http\Request;

/**
 * Class MedicohorarioController
 * @package App\Http\Controllers
 */
class MedicohorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicohorarios = Medicohorario::paginate();

        return view('medicohorario.index', compact('medicohorarios'))
            ->with('i', (request()->input('page', 1) - 1) * $medicohorarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicohorario = new Medicohorario();
        return view('medicohorario.create', compact('medicohorario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medicohorario::$rules);

        $medicohorario = Medicohorario::create($request->all());

        return redirect()->route('medicohorarios.index')
            ->with('success', 'Medicohorario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicohorario = Medicohorario::find($id);

        return view('medicohorario.show', compact('medicohorario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicohorario = Medicohorario::find($id);

        return view('medicohorario.edit', compact('medicohorario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medicohorario $medicohorario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicohorario $medicohorario)
    {
        request()->validate(Medicohorario::$rules);

        $medicohorario->update($request->all());

        return redirect()->route('medicohorarios.index')
            ->with('success', 'Medicohorario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medicohorario = Medicohorario::find($id)->delete();

        return redirect()->route('medicohorarios.index')
            ->with('success', 'Medicohorario deleted successfully');
    }
    public function crearCitas($desde,$hasta)
    {

    }
}
