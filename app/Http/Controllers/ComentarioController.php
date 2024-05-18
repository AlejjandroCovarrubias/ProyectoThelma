<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comentario->user_id = Auth::id();
        $comentario->receta_id = $request->receta_id;   
        $comentario->comentario = $request->comentario;
        $comentario->puntuacion = $request->estrellas;
        $comentario->save();

        $recipe=Receta::findOrFail($comentario->receta_id);
        $cliente=User::findOrFail($recipe->user_id);
        
        return back();
        //return redirect()->route('receta.',compact('recipe'),compact('cliente')); //, $request->receta_id ('recetas.mireceta',compact('recipe'),compact('cliente'));
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
