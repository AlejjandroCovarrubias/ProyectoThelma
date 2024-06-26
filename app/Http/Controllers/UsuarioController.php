<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->only('follow','unfollow','fav','unfav','banreceta','bancomentario','moderador','moderadorRecetas','moderadorAdd','setinfluencer','setNewMod','destroyReporteComentario','destroy','recetaReportada','destroyReporteReceta');
    }

    public function myProfile($id)
    {
        $usuario=User::findOrFail($id);
        $recetasFav=$usuario->favoriteRecipes()->get();
        return view('user.myprofile',compact('usuario','recetasFav'));
    }

    public function updateJetstream(Request $request)
    {

        $request->validate([
            'image' => 'nullable|image|max:2048', // Validación para la imagen
            'nickname_new' => 'nullable|string|min:3|max:255', // Validación para el nuevo apodo
            'nickname_confirm' => 'required_with:nickname_new|same:nickname_new', // Validación para confirmar el nuevo apodo
            'password_act' => 'nullable|string|min:8', // Validación para la contraseña actual
            'password_new' => 'nullable|string|min:8|different:password_act', // Validación para la nueva contraseña
            'password_confirm' => 'required_with:password_new|same:password_new', // Validación para confirmar la nueva contraseña
            'about_me' => 'nullable|string|max:255', // Validación para 'sobre mí'
            'twitter' => 'nullable|string|max:255', // Validación para Twitter
            'facebook' => 'nullable|string|max:255', // Validación para Facebook
            'instagram' => 'nullable|string|max:255', // Validación para Instagram
        ]);

        $user=Auth::user();
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('profile-photos', 'public');
            $user->profile_photo_path=$imagePath;
        }
            
        if($request->filled('nickname_new')){
            if($request->nickname_new===$request->nickname_confirm){
                $user->nickname=$request->nickname_new;
            } else {
                return redirect()->back()->withErrors(['nickname_new' => 'El nuevo apodo no coincide con la confirmación.']);
            }        
        }
            
        if ($request->filled('password_act')) {
            if (Hash::check($request->password_act, $user->password)) {
                if ($request->password_new === $request->password_confirm) {
                    $user->password = Hash::make($request->password_new);
                } else {
                    return redirect()->back()->withErrors(['password_new' => 'La nueva contraseña no coincide con la confirmación.']);
                }
            } else {
                return redirect()->back()->withErrors(['password_act' => 'La contraseña actual es incorrecta.']);
            }
        }
        

        if($request->filled('about_me')){
            $user->aboutyou=$request->about_me;
        }

        if($request->filled('twitter')){
            $user->twitterID=$request->twitter;
        }

        if($request->filled('facebook')){
            $user->facebookID=$request->facebook;
        }

        if($request->filled('instagram')){
            $user->instagramID=$request->instagram;
        }

        $user->save();
        return back();
    }

    public function follow(Request $request)
    {
        $user=Auth::user();
        $user->following()->attach($request->id);
        return back();
    }

    public function unfollow(Request $request)
    {
        $user=Auth::user();
        $user->following()->detach($request->id);
        return back();
    }

    public function fav($id)
    {
        $user=Auth::user();
        $user->favoriteRecipes()->attach($id);
        return back();
    }

    public function unfav($id)
    {
        $user=Auth::user();
        $user->favoriteRecipes()->detach($id);
        return back();
    }

    public function banreceta(Request $request)
    {
        $request->validate([
            'descripcion' => 'string|max:255',
        ]);
        $id=request()->id;
        $descripcion=request()->descripcion;


        $user=Auth::user();
        $user->reporteRecipes()->attach($id, ['descripcion' => $descripcion]);
        return back()->with('status', 'Receta reportada correctamente.');
    }
    public function bancomentario(Request $request)
    {
        $request->validate([
            'descripcion' => 'string|max:255',
        ]);
        $id=request()->idComentario;
        $descripcion=request()->descripcionComentario;


        $user=Auth::user();
        $user->reporteComentario()->attach($id, ['descripcion' => $descripcion]);
        return back();
    }

    public function moderador($id){
        $usuario=User::findOrFail($id);
        $this->authorize('verModerador',$usuario);
        $reportes=DB::table('user_comentario_reporte')->get();
        //dd($reportes);
        return view('moderador.vistamoderador',compact('usuario'),compact('reportes'));
    }

    public function moderadorRecetas($id){
        $usuario = User::findOrFail($id);
        $this->authorize('verModerador',$usuario);
        $recetasReportadas = DB::table('user_receta_reporte')->get(); 

        return view('moderador.recetasReportadas', compact('usuario', 'recetasReportadas'));
    }



    public function destroy($id){
        $usuario=User::findOrFail($id);
        $this->authorize('verModerador',Auth::user());
        $usuario->delete();
        return back();
    }

    public function destroyReporteComentario($id){
        $this->authorize('verModerador',Auth::user());
        DB::table('user_comentario_reporte')->where('id',$id)->delete();
        return back();
    }

    public function destroyReporteReceta($id){
        $this->authorize('verModerador',Auth::user());
        DB::table('user_receta_reporte')->where('id',$id)->delete();
        return back();
    }
    public function recetaReportada($id){
        $recipe=Receta::findOrFail($id);
        $this->authorize('verModerador',Auth::user());
        return view('moderador.recetaReportada', compact('recipe'));
    }

    public function setNewMod($id)
    {
        $this->authorize('verModerador',Auth::user());
        $usuario=User::findOrFail($id);
        $usuario->moderador=true;
        $usuario->save();
        return back();
    }

    public function setinfluencer($id)
    {
        $this->authorize('verModerador',Auth::user());
        $usuario=User::findOrFail($id);
        $usuario->influencer=true;
        $usuario->save();
        return back();
    }

    public function moderadorAdd(){
        $this->authorize('verModerador',Auth::user());
        $usuarios=User::where('moderador',false)->get();
        return view('moderador.addMod',compact('usuarios'));
    }

}
