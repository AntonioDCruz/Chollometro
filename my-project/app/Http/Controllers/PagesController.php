<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chollo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function inicio() {
        $chollos = Chollo::all();
        return view('inicio', @compact('chollos'));
    }

    public function login() {
        return view('auth/login');
    }

    public function register() {
        return view('auth/register');
    }


    public function nuevos() { 
        $chollos = Chollo::select('id','titulo', 'created_at', 'descripcion', 'url', 'categoria', 'puntuacion', 'precio', 'precio_descuento')
        ->orderBy('created_at','desc')
        ->get();
        return view('nuevos', @compact('chollos'));
    }

    public function destacados() {
        $chollos = Chollo::select('id','titulo', 'created_at', 'descripcion', 'url', 'categoria', 'puntuacion', 'precio', 'precio_descuento')
        ->orderBy('puntuacion','desc')
        ->get();
        return view('destacados', @compact('chollos'));
    }

    public function editaChollo() {
        return view('editaChollo');
    }

    public function creaChollo() {
        $categorias = Categoria::all();
        return view('creaChollo', @compact('categorias'));
    }

    public function crear(Request $request) {
        $cholloNuevo = new Chollo();
        $usuario = Auth::user()->id;
    
        $request -> validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
            'categorias' => 'required',
            'puntuacion' => 'required',
            'precio' => 'required',
            'precio_descuento' => 'required',
            //'disponible' => 'required',
        ]);

        $cholloNuevo -> titulo = $request -> titulo;
        $cholloNuevo -> descripcion = $request -> descripcion;
        $cholloNuevo -> url = $request -> url;
        //$cholloNuevo -> categoria = $request -> categoria;
        $cholloNuevo -> puntuacion = $request -> puntuacion;
        $cholloNuevo -> precio = $request -> precio;
        $cholloNuevo -> precio_descuento = $request -> precio_descuento;
        $cholloNuevo -> disponible = 1;
        $cholloNuevo -> user_id = $usuario;
        $cholloNuevo -> save();
    

        foreach($request -> categorias as $categoria){
            $cholloNuevo -> categorias() -> attach($categoria);
        }
        return back() -> with('mensaje', 'Chollo agregado exitósamente');
    }
    
    public function editar($id) {
        $chollo = Chollo::findOrFail($id);
      
        return view('editaChollo', @compact('chollo'));
    }
    
    

    public function actualizar(Request $request, $id) {
        $request -> validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
            'categorias' => 'required',
            'puntuacion' => 'required',
            'precio' => 'required',
            'precio_descuento' => 'required',
            //'disponible' => 'required',
        ]);
      
        $cholloActualizar = Chollo::findOrFail($id);
      
        $cholloActualizar -> titulo = $request -> titulo;
        $cholloActualizar -> descripcion = $request -> descripcion;
        $cholloActualizar -> url = $request -> url;
        //$cholloActualizar -> categoria = $request -> categoria;
        $cholloActualizar -> puntuacion = $request -> puntuacion;
        $cholloActualizar -> precio = $request -> precio;
        $cholloActualizar -> precio_descuento = $request -> precio_descuento;
        $cholloActualizar -> disponible = 1;
      
        $cholloActualizar -> save();

        foreach($request -> categorias as $categoria){
            $cholloActualizar -> categorias() -> syncWithPivotValues (
                [$cholloActualizar -> id] , ['categoria_id' => $categoria] 
            );
        }
      
        return back() -> with('mensaje', 'Chollo actualizado');
      }

    public function chollos() {
        $chollos = Chollo::all();
        print_r($chollos);
        return view('inicio', @compact('chollos'));
    }

    public function eliminar($id) {
        $chollo = Chollo::findOrFail($id);
        $chollo -> categorias() -> detach();
        $chollo -> delete();
      
        return back() -> with('mensaje', 'Chollo Eliminado');
      }

    public function vistaChollo($id) {
        $chollo = Chollo::findOrFail($id);
      
        return view('vistaChollo', @compact('chollo'));
    }  
}
