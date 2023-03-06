<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;


class ContactoController extends Controller
{
    public function comentario(Request $request)
    {
        Contacto::create([
            'nombre' => $request->post('nombre'),
            'apellidos' => $request->post('apellidos'),
            'descripcion' => $request->post('descripcion'),
        ]);
        return redirect('/index')->with('success', 'Comentario enviado correctamente');


        /*  $Comentario = new Contacto();
        $Comentario->nombre = $request->post('nombre');
        $Comentario->apellidos = $request->post('apellidos');
        $Comentario->descripcion = $request->post('descripcion');
        $Comentario->save();
        */
    }
}
