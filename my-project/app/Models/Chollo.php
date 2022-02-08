<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    public function categorias()
    {
        return $this -> belongsToMany(Categoria::class);
    }
    public function usuario()
    {
      return $this -> belongsTo(User::class);
    }
}
