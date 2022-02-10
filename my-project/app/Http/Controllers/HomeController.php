<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chollo;
use Illuminate\Http\Request;

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
      
        return view('editaChollo', @compact('chollo'));
    }

    public function creaChollo() {
        $categorias = Categoria::all();
        return view('creaChollo', @compact('categorias'));
    }
}
