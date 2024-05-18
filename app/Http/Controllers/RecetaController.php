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
        //$this->middleware('auth')->only('create');
        $this->middleware('auth')->only('create','index');
    }

    public function index()
    {
        //$recipe=Auth::user()->recetas;
        $recipe=Auth::user()->recetas;
        //return view('recetas.index2', compact('recipe'));
        return view('recetas.misRecetas',compact('recipe'));
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
        return redirect()->route('receta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //testing
    {
        $recipe=Receta::findOrFail($id);
        $cliente=User::findOrFail($recipe->user_id);
        $average = $recipe->comentarios()->get()->avg('puntuacion');
        
        return view('recetas.mireceta',compact('recipe'), compact('cliente'), compact('average'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($receta)
    {
        $recipe=Receta::findOrFail($receta);
        return view('recetas.editRecipe',compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $receta)
    {
        $recipe=Receta::findOrFail($receta);
        $request->validate([
            'title'=>'required|max:255',
            'visibility'=>'required',
            'text'=>'required|max:300',
        ]);
        $recipe->title_recipe=$request->title;
        $recipe->descrip_recipe=$request->text;
        $recipe->privacy=$request->visibility;
        
        $recipe->save();

        $recipe->instructions()->delete();
        $recipe->tags()->delete();
        $recipe->ingredients()->delete();

        foreach ($request->instruc as $instruccion){
            $recipe->instructions()->create(['instruccion' => $instruccion]);
        }

        foreach ($request->tags as $tag){
            $recipe->tags()->create(['tag' => $tag]);
        }

        foreach ($request->ingrediente as $ingredient){
            $recipe->ingredients()->create(['ingredient' => $ingredient]);
        }
        return redirect()->route('receta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }

    public function landing() {
        $recipes=Receta::all();

        return view('recetas.landing',compact('recipes'));
    }
}
