<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casilla;

class CasillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casillas = Casilla::all();
        return view('casilla/list', compact('casillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casilla/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());
        $validacion = $request->validate([
                'ubicacion' => 'required|max:100',
        ]);

        $data['ubicacion'] = $request->ubicacion;
        $casilla = Casilla::create($data);
        return redirect('casilla')->with('succes',
        $casilla->ubicacion . ' guardado satisfactoriamente ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Element $id"; /// "Element " . $id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo "Element $id to Edit";
        $casilla = casilla::find($id);
        return view('casilla/edit', compact('casilla'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        $request->validate([
            'ubicacion' => 'required|max:100',
        ]);

        $data['ubicacion']= $request->ubicacion;
        Casilla::whereId($id)->update($data);
        return redirect('casilla')
        ->with('success', 'Actualizado correctamente...');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Element $id has deleted";

        Casilla::whereId($id)->delete();
        return redirect('casilla');
    }
}
