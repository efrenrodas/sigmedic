<?php

namespace App\Http\Controllers;

use App\Models\Examene;
use Illuminate\Http\Request;

/**
 * Class ExameneController
 * @package App\Http\Controllers
 */
class ExameneController extends Controller
{
    

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request);
     #   request()->validate(Examene::$rules);

        $examene = Examene::create($request->all());

        // return redirect()->route('examenes.index')
        //     ->with('success', 'Examene created successfully.');
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
        $examene = Examene::find($id);

        return view('examene.show', compact('examene'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examene = Examene::find($id);

        return view('examene.edit', compact('examene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Examene $examene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examene $examene)
    {
        request()->validate(Examene::$rules);

        $examene->update($request->all());

        return redirect()->route('examenes.index')
            ->with('success', 'Examene updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examene = Examene::find($id)->delete();

        return redirect()->route('examenes.index')
            ->with('success', 'Examene deleted successfully');
    }
}
