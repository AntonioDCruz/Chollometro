<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
  public $timestamps=false;
    use HasFactory;

    public function categoria()
    {
        return $this -> belongsToMany(Categoria::class);
    }
    public function user()
    {
      return $this -> belongsTo(User::class);
    }
}
