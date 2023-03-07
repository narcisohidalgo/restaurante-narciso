<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\Invitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Reserva = new Reserva();
        $Reserva->id_cliente = Auth::user()->id;
        $Reserva->id_menus = $request->post('menu');
        $Reserva->fecha_reservas =  $request->post('horario');
        $Reserva->num_tarjetas = $request->post('tarjeta');
        $Reserva->num_personas = $request->post('comensales');
        $Reserva->id_mesas = 1;
        $Reserva->save();
        $reservado = Horario::where('id', $request->post('horario'));
        $reservado->update(['estado' => 'Reservado']);
        return redirect('/misreservas')->with('success', 'Reserva realizada correctamente');
    }

    public function storeinvitado(Request $request)
    {
        Invitado::create([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'telefono' => $request->post('telefono')
        ]);

        $datoInvitado = Invitado::orderBy('id', 'desc')->get();
        $inviId = $datoInvitado->first();

        Reserva::create([
            'id_invitados' => $inviId->id,
            'id_mesas' => 1,
            'id_menus' => $request->post('menu'),
            'fecha_reservas' => $request->post('horario'),
            'num_tarjetas' => $request->post('tarjeta'),
            'num_personas' => $request->post('comensales')

        ]);
        $reservado = Horario::where('id',$request->post('horario'));
        $reservado->update(['estado' => 'Reservado']);
        return redirect("/index")->with('success', 'Reserva realizada correctamente');
    }

    public function recogerTodo(Request $request)
    {
        $menus = Menu::Menus();
        $asientos= Mesa::all();
        $fechas = $request->post('fecha');
        $horas = $request->post('hora');
        $id = $request->post('horario');
        return view("reserva", ['id' => $id, 'fecha' => $fechas, 'hora' => $horas, 'menus' => $menus, 'asientos' =>$asientos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showall()
    {

        $Lista_reservar = Reserva::where('id_cliente', Auth::user()->id)->get();
        return view("misReservas", ['lista' => $Lista_reservar]);
    }

    public function eliminarReservas($id)
    {
        $horario = Reserva::select('fecha_reservas')->where('id', $id)
            ->get();
        Reserva::find($id)->delete();
        $borrado = Horario::where('id', $horario->value('fecha_reservas'));
        $borrado->update(['estado' => 'Disponible']);

        return redirect("/misreservas")->with('success', 'Reserva eliminada correctamente');
    }
    public function Evento()
    {
        $horario = Horario::select('fecha')
            ->where('estado', 'Disponible')
            ->groupBy('fecha')
            ->get();


        $datos = array();

        foreach ($horario as $row) {
            $datos[] = array(
                'id' => $row["id"],
                'title' => "",
                'start' => $row["fecha"],
                'end' => $row["fecha"],
            );
        }
        return response()->json($datos);
    }

    public function Eventoajax(Request $request)
    {
        $horario = Horario::where([
            ['fecha', $request->get("fecha")],
            ['estado', 'Disponible']
        ])->get();
        $hora = array();

        foreach ($horario as $row) {
            $hora[] = array(
                'id' => $row["id"],
                "hora" => date('H:i', strtotime($row["hora"])),
            );
        }
        return response()->json($hora);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
