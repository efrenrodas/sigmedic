<?php

namespace App\Http\Controllers;

use App\Models\Userenfermedade;
use Illuminate\Http\Request;

/**
 * Class UserenfermedadeController
 * @package App\Http\Controllers
 */
class UserenfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userenfermedades = Userenfermedade::paginate();

        return view('userenfermedade.index', compact('userenfermedades'))
            ->with('i', (request()->input('page', 1) - 1) * $userenfermedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userenfermedade = new Userenfermedade();
        return view('userenfermedade.create', compact('userenfermedade'));
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
        request()->validate(Userenfermedade::$rules);

        $userenfermedade = Userenfermedade::create($request->all());
        $userenfermedades=Userenfermedade::where('id_paciente','=',$request['id_paciente'])->paginate();
        return redirect()->back()->withInput(compact('userenfermedades'));



        // return redirect()->route('userenfermedades.index')
        //     ->with('success', 'Userenfermedade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userenfermedade = Userenfermedade::find($id);

        return view('userenfermedade.show', compact('userenfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userenfermedade = Userenfermedade::find($id);

        return view('userenfermedade.edit', compact('userenfermedade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Userenfermedade $userenfermedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userenfermedade $userenfermedade)
    {
        request()->validate(Userenfermedade::$rules);

        $userenfermedade->update($request->all());

        return redirect()->route('userenfermedades.index')
            ->with('success', 'Userenfermedade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userenfermedade = Userenfermedade::find($id)->delete();
        return redirect()->back();
        // return redirect()->route('userenfermedades.index')
        //     ->with('success', 'Userenfermedade deleted successfully');
    }
}
