<?php

namespace App\Http\Controllers;

use App\Models\Medicosespecialidade;
use Illuminate\Http\Request;

/**
 * Class MedicosespecialidadeController
 * @package App\Http\Controllers
 */
class MedicosespecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicosespecialidades = Medicosespecialidade::paginate();

        return view('medicosespecialidade.index', compact('medicosespecialidades'))
            ->with('i', (request()->input('page', 1) - 1) * $medicosespecialidades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicosespecialidade = new Medicosespecialidade();
        return view('medicosespecialidade.create', compact('medicosespecialidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medicosespecialidade::$rules);

        $medicosespecialidade = Medicosespecialidade::create($request->all());

        return redirect()->route('medicosespecialidades.index')
            ->with('success', 'Medicosespecialidade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicosespecialidade = Medicosespecialidade::find($id);

        return view('medicosespecialidade.show', compact('medicosespecialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicosespecialidade = Medicosespecialidade::find($id);

        return view('medicosespecialidade.edit', compact('medicosespecialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medicosespecialidade $medicosespecialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicosespecialidade $medicosespecialidade)
    {
        request()->validate(Medicosespecialidade::$rules);

        $medicosespecialidade->update($request->all());

        return redirect()->route('medicosespecialidades.index')
            ->with('success', 'Medicosespecialidade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medicosespecialidade = Medicosespecialidade::find($id)->delete();

        return redirect()->route('medicosespecialidades.index')
            ->with('success', 'Medicosespecialidade deleted successfully');
    }
}
