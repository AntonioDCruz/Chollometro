<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

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
        return view('creaChollo');
    }

    public function crear(Request $request) {
        $cholloNuevo = new Chollo();
    
        $request -> validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
            'categoria' => 'required',
            'puntuacion' => 'required',
            'precio' => 'required',
            'precio_descuento' => 'required',
            'disponible' => 'required',
        ]);

        $cholloNuevo -> titulo = $request -> titulo;
        $cholloNuevo -> descripcion = $request -> descripcion;
        $cholloNuevo -> url = $request -> url;
        $cholloNuevo -> categoria = $request -> categoria;
        $cholloNuevo -> puntuacion = $request -> puntuacion;
        $cholloNuevo -> precio = $request -> precio;
        $cholloNuevo -> precio_descuento = $request -> precio_descuento;
        $cholloNuevo -> disponible = $request -> disponible;
    
        $cholloNuevo -> save();
    
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
            'categoria' => 'required',
            'puntuacion' => 'required',
            'precio' => 'required',
            'precio_descuento' => 'required',
            'disponible' => 'required',
        ]);
      
        $cholloActualizar = Chollo::findOrFail($id);
      
        $cholloActualizar -> titulo = $request -> titulo;
        $cholloActualizar -> descripcion = $request -> descripcion;
        $cholloActualizar -> url = $request -> url;
        $cholloActualizar -> categoria = $request -> categoria;
        $cholloActualizar -> puntuacion = $request -> puntuacion;
        $cholloActualizar -> precio = $request -> precio;
        $cholloActualizar -> precio_descuento = $request -> precio_descuento;
        $cholloActualizar -> disponible = $request -> disponible;
      
        $cholloActualizar -> save();
      
        return back() -> with('mensaje', 'Chollo actualizado');
      }

    public function chollos() {
        $chollos = Chollo::all();
        print_r($chollos);
        return view('inicio', @compact('chollos'));
    }

    public function eliminar($id) {
        $notaEliminar = Chollo::findOrFail($id);
        $notaEliminar -> delete();
      
        return back() -> with('mensaje', 'Chollo Eliminado');
      }

    public function vistaChollo($id) {
        $chollo = Chollo::findOrFail($id);
      
        return view('vistaChollo', @compact('chollo'));
    }  
}
