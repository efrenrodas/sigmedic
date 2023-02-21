<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Receta;

use Illuminate\Http\Request;
use PDF;

/**
 * Class RecetaController
 * @package App\Http\Controllers
 */
class RecetaController extends Controller
{
    

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());

        return redirect()->back();

        // return redirect()->route('recetas.index')
        //     ->with('success', 'Receta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::find($id);

        return view('receta.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Receta::find($id);

        return view('receta.edit', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        request()->validate(Receta::$rules);

        $receta->update($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $receta = Receta::find($id)->delete();

        return redirect()->back();
        // return redirect()->route('recetas.index')
        //     ->with('success', 'Receta deleted successfully');
    }
    public function imprimir($id)
    {
        $recetas=Receta::where('id_cita','=',$id)->get();
        $cita=Cita::find($id);
       // return response()->json($cita);
        $pdf=PDF::loadView('pdf.receta',compact('recetas','cita'));
        $pdf->set_option('margin-left', 1);
        $pdf->set_option('margin-right', 1);
        $pdf->set_option('margin-top', 1);
        $pdf->set_option('margin-bottom', 1);
        $pdf->setPaper('A3', 'portrait');
        return $pdf->download($id.'receta.pdf');
    #  return view('pdf.receta',compact('recetas','cita'));
      //
    }
}
