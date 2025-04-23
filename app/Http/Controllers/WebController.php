<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Event;
use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(){
        

        $consultorios = Consultorio::all();
        return view('index', compact('consultorios'));
    }

    public function cargar_datos_consultorio($id){

        //el nombre del consultorio
        $consultorio = Consultorio::find($id);
        try{
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('cargar_datos_consultorio', compact('horarios', 'consultorio'));
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    }
//ajax controller

public function cargar_reserva_doctores($id){
    try {
        $eventos = Event::where('doctor_id', $id)
            ->get(['id', 'title', 'start', 'enf', 'color']) // Trae los datos sin formato
            ->map(function ($evento) {
                return [
                    'id' => $evento->id,
                    'title' => $evento->title,
                    'start' => Carbon::parse($evento->start)->format('Y-m-d'),
                    'enf' => Carbon::parse($evento->enf)->format('Y-m-d'),
                    'color' => $evento->color,
                ];
            });

        return response()->json($eventos);
    } catch (\Exception $exception) {
        return response()->json([
            'mensaje' => 'Error',
            'error' => $exception->getMessage()
        ]);
    }
}

}
