<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = ['razon_social','ruc','nombre','direccion','telefono'];

    public function inputs(){
        return $this->hasMany(Input::class);
    }
}
