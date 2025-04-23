<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Exception;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.index', compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create', compact('doctores','consultorios','horarios'));

    }

    public function cargar_datos_consultorios($id){
        try{
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id',$id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorio', compact('horarios'));
        }catch(\Exception $exception){
            return response()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dias'=> 'required',
            'hora_inicio'=> 'required',
            'hora_fin'=> 'required',
            'consultorio_id' => 'required|exists:consultorios,id'

       ]);

       //verificar si el horario ya existe para ese dia y rango de horas
       $horarioExistente = Horario::where('dias', $request->dias)
            ->where('consultorio_id', $request->consultorio_id)
            ->where(function ($query) use ($request){
                $query->where(function($query) use ($request){
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request){
                            $query->where('hora_fin', '>', $request->hora_inicio)
                                ->where('hora_fin', '<=', $request->hora_fin);
                        })
                    ->orWhere(function ($query) use ($request){
                            $query->where('hora_inicio', '<', $request->hora_inicio)
                                ->where('hora_fin', '>', $request->hora_fin);
                        });
            })
            ->exists();

        if($horarioExistente){
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'ya existe un horario que se superpone con el horario ingresado')
                ->with('icono', 'error');
        }

       Horario::create($request->all());

       return redirect()->route('admin.horarios.index')
       ->with('mensaje','se registro al horario de la manera correcta')
       ->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horarios = Horario::findOrFail($id);
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        return view('admin.horarios.edit', compact ('horarios','doctores','consultorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validación de los campos
    $request->validate([
        'dias' => 'required',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        'consultorio_id' => 'required|exists:consultorios,id',
        'doctor_id' => 'required|exists:doctors,id',
    ]);

    // Obtener el horario actual
    $horario = Horario::findOrFail($id);

    // Verificar si el nuevo horario se superpone con otros horarios
    $horariosConflicto = Horario::where('id', '!=', (int)$horario->id) // Aseguramos tipo entero
        ->where('dias', $request->dias)
        ->where('consultorio_id', $request->consultorio_id)
        ->where('doctor_id', $request->doctor_id)
        ->where(function ($query) use ($request) {
            $query->where('hora_inicio', '<', $request->hora_fin)
                  ->where('hora_fin', '>', $request->hora_inicio);
        })
        ->get();

    // Depurar: mostrar conflictos detalladamente
    if ($horariosConflicto->count() > 0) {
        dd([
            'ID del horario actual' => $horario->id,
            'Horarios en conflicto' => $horariosConflicto->toArray()
        ]);
    }

    // Si no hay conflicto, actualizar el horario
    $horario->update($request->only([
        'dias',
        'hora_inicio',
        'hora_fin',
        'consultorio_id',
        'doctor_id'
    ]));

    return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Horario actualizado correctamente')
        ->with('icono', 'success');
}

    



    public function confirmDelete($id){

        $horarios= Horario::findOrFail($id);
        return view('admin.horarios.delete', compact ('horarios'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Horario::destroy($id);

        return redirect()->route('admin.horarios.index')
        ->with('mensaje','se elimino el horario de la manera correcta')
        ->with('icono','success');
    }
}
