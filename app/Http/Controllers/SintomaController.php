<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use Illuminate\Http\Request;

/**
 * Class SintomaController
 * @package App\Http\Controllers
 */
class SintomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sintomas = Sintoma::paginate();

        return view('sintoma.index', compact('sintomas'))
            ->with('i', (request()->input('page', 1) - 1) * $sintomas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sintoma = new Sintoma();
        return view('sintoma.create', compact('sintoma'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return response()->json($request);
        request()->validate(Sintoma::$rules);

        $sintoma = Sintoma::create($request->all());

        // return redirect()->route('sintomas.index')
        //     ->with('success', 'Sintoma created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sintoma = Sintoma::find($id);

        return view('sintoma.show', compact('sintoma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sintoma = Sintoma::find($id);

        return response()->json($sintoma,'200');

      //  return view('sintoma.edit', compact('sintoma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sintoma $sintoma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sintoma $sintoma)
    {
        request()->validate(Sintoma::$rules);

        $sintoma->update($request->all());

        return redirect()->route('sintomas.index')
            ->with('success', 'Sintoma updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sintoma = Sintoma::find($id)->delete();
        return redirect()->back();

        // return redirect()->route('sintomas.index')
        //     ->with('success', 'Sintoma deleted successfully');
    }
    public function traer(Request $request)
    {
        $id=$request['id_sintoma'];
        $sintoma = Sintoma::find($id);

        return response()->json($sintoma,'200');
    }
}
