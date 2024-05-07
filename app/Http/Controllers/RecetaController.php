<?php

namespace App\Http\Controllers;

use App\Models\Instructions;
use App\Models\User;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function index()
    {
        //$recipe=Auth::user()->recetas;
        $recipe=Receta::all();
        return view('recetas.index',compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recetas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'visibility'=>'required',
            'text'=>'required|max:300',
        ]);
        
        $cliente=User::findOrFail(Auth::id());
        $receta=new Receta();
        $receta->user_id=Auth::id();
        $receta->title_recipe=$request->title;
        $receta->descrip_recipe=$request->text;
        $receta->privacy=$request->visibility;
        
        $cliente->recetas()->save($receta);

        foreach ($request->instruc as $instruccion){
            $receta->instructions()->create(['instruccion' => $instruccion]);
        }

        foreach ($request->tags as $tag){
            $receta->tags()->create(['tag' => $tag]);
        }

        foreach ($request->ingrediente as $ingredient){
            $receta->ingredients()->create(['ingredient' => $ingredient]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Receta $receta) //testing
    {
        return view('recetas.mireceta',compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
