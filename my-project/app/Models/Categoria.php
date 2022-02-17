<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    public function chollos()
    {
        return $this -> belongsToMany(Chollo::class,'categoria_chollo');
    }
}
