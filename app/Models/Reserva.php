<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_clientes',
        'id_invitados',
        'id_menus',
        'id_mesas',
        'num_tarjetas',
        'fecha_reservas',
        'num_personas'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_clientes');
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'id_menus');
    }

    public function horarios()
    {
        return $this->belongsTo(Horario::class, 'fecha_reservas');
    }

    public function mesas()
    {
        return $this->belongsTo(Mesa::class, 'id_mesas');
    }

    public function invitados()
    {
        return $this->belongsTo(Invitado::class, 'id_invitados');
    }

    public static function eliminarReserva($id)
    {
        $eliminar = Reserva::findorfail($id);
        $eliminar->delete();
    }
}
