<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

/**
 * Class DiagnosticoController
 * @package App\Http\Controllers
 */
class DiagnosticoController extends Controller
{
   
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       # return response()->json($request);
        request()->validate(Diagnostico::$rules);

        $diagnostico = Diagnostico::create($request->all());

        // return redirect()->route('diagnosticos.index')
        //     ->with('success', 'Diagnostico created successfully.');
        return  redirect()->back();
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnostico = Diagnostico::find($id);

        return view('diagnostico.edit', compact('diagnostico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Diagnostico $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostico $diagnostico)
    {
        request()->validate(Diagnostico::$rules);

        $diagnostico->update($request->all());

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnostico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $diagnostico = Diagnostico::find($id)->delete();

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnostico deleted successfully');
    }
}
