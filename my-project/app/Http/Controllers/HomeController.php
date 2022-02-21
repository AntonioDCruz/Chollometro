<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chollo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chollos = Chollo::all();
        return view('inicio', @compact('chollos'));
    }

    public function editar($id) {
        $chollo = Chollo::findOrFail($id);
        $categorias = Categoria::all();
        return view('editaChollo', @compact('chollo'), @compact('categorias'));
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
        $categorias = $request -> categorias;
        $cholloNuevo -> save();
    

        /*foreach($request -> categorias as $categoria){
            $cholloNuevo -> categorias() -> attach($categoria);
        }*/
        $cholloNuevo -> attachCategorias($categorias);

        return back() -> with('mensaje', 'Chollo agregado exitósamente');
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
        $categoriasAll = Categoria::all();

        $cholloActualizar -> titulo = $request -> titulo;
        $cholloActualizar -> descripcion = $request -> descripcion;
        $cholloActualizar -> url = $request -> url;
        //$cholloActualizar -> categoria = $request -> categoria;
        $cholloActualizar -> puntuacion = $request -> puntuacion;
        $cholloActualizar -> precio = $request -> precio;
        $cholloActualizar -> precio_descuento = $request -> precio_descuento;
        $cholloActualizar -> disponible = 1;
        $categorias = $request -> categorias;

        $cholloActualizar -> save();

        $cholloActualizar -> detachCategorias($categoriasAll);
        $cholloActualizar -> attachCategorias($categorias);

        /*foreach($request -> categorias as $categoria){
            $cholloActualizar -> categorias() -> syncWithPivotValues (
                [$cholloActualizar -> id] , ['categoria_id' => $categoria] 
            );
        }*/
      
        return back() -> with('mensaje', 'Chollo actualizado');
      }



    public function eliminar($id) {
        $chollo = Chollo::findOrFail($id);
        $chollo -> categorias() -> detach();
        $chollo -> delete();
      
        return back() -> with('mensaje', 'Chollo Eliminado');
      }
}
