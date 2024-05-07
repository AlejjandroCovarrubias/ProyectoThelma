<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    public function index()
    {
        //return view('comentario.index');
    }*/

    /**
     * Show the form for creating a new resource.
     *
    public function create()
    {
        //return view('comentarios.create');
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos los datos
        $request->validate([
            'comentario' => 'max:255',
            'estrellas' => 'required|numeric|min:1|max:5',
            'receta_id' => 'required|numeric',
        ]);

        //Guardamos el comentario
        $comentario = new Comentario();
        $comentario->user_id = Auth()::id();
        $comentario->receta_id = $request->receta_id;   
        $comentario->comentario = $request->comentario;
        $comentario->puntuacion = $request->estrellas;
        $comentario->created_at = now();
        $comentario->save();
        
        return redirect()->route('receta.show'); //, $request->receta_id
    }

    /**
     * Display the specified resource.
     *
    public function show(Comentario $comentario)
    {
        //return 'show';
    }*/

    /**
     * Show the form for editing the specified resource.
     *
    public function edit(Comentario $comentario)
    {
        //return 'edit';
    }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
