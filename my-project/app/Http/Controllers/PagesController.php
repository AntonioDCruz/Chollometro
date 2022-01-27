<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio() {
        return view('inicio');
    }

    public function nuevos() { 
        return view('nuevos');
    }

    public function destacados() {
        return view('destacados');
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
      
        return view('chollos.editar', compact('chollo'));
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
      
        return back() -> with('mensaje', 'Nota actualizada');
      }

    public function chollos() {
        $chollos = Chollo::all();
      
        return view('inicio', compact('chollos'));
    }
}
