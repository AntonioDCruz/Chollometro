<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
  public $timestamps=false;
    use HasFactory;

    public function categorias()
    {
        return $this -> belongsToMany(Categoria::class, 'categoria_chollo');
    }
    
    public function user()
    {
      return $this -> belongsTo(User::class);
    }

    public function attachCategorias($categorias)
    {
      $this -> categorias() -> attach($categorias);
    }

    public function detachCategorias($categorias)
    {
      $this -> categorias() -> detach($categorias);
    }
}
