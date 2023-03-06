<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;
    protected $table='invitados';
    protected $primaryKey='id';
    protected $fillable = [
        'email',
        'name',
        'telefono'
    ];

    //Relacion uno a muchos
    public function invitado(){
        return $this->hasMany(Reserva::class, 'id_invitados');
    }
    
}
