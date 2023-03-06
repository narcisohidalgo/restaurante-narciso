<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'precio'
    ];


    //Relacion de muchos a uno
    public function reserva(){
        return $this->belongsTo(Reserva::class, 'id');
    }

    public static function Menus(){
        return Menu::all();
    }
}
