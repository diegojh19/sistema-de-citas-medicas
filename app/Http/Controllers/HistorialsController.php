<?php

namespace App\Http\Controllers;

use App\Models\configuracione;
use App\Models\Historials;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HistorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       

        $historiales = Historials::with('paciente','doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('admin.historial.create',compact('pacientes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $historial = new Historials();
       $historial->detalle = $request->detalle;
       $historial->fecha_visita = $request->fecha_visita;
       $historial->paciente_id = $request->paciente_id;
       $historial->doctor_id = Auth::user()->doctor->id;
       $historial->save();


       return redirect()->route('admin.historial.index')
       ->with('mensaje','se registro el historial medico del paciente de la manera correcta')
       ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $historial = Historials::find($id);
        return view('admin.historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $historial = Historials::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('admin.historial.edit', compact('historial','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $historial = Historials::find($id);
       $historial->detalle = $request->detalle;
       $historial->fecha_visita = $request->fecha_visita;
       $historial->paciente_id = $request->paciente_id;
       $historial->doctor_id = Auth::user()->doctor->id;
       $historial->save();


       return redirect()->route('admin.historial.index')
       ->with('mensaje','se actualizo el historial medico del paciente de la manera correcta')
       ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete($id){

        $historial = Historials::find($id);
        return view('admin.historial.delete', compact ('historial'));
    }

    public function destroy( $id)
    {
        $historial = Historials::find($id);
        $historial->delete();

         return redirect()->route('admin.historial.index')
        ->with('mensaje','se elimino el historial clinico de la manera correcta')
        ->with('icono','success');
    }

    public function pdf($id){
        $configuracion = configuracione::latest()->first();
        
        $historial = Historials::find($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.historial.pdf', compact('configuracion','historial'));
        
        //incluir la numeracion de pagina y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null,10,array(0,0,0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null,10,array(0,0,0));
        $canvas->page_text(450, 800, "Fecha:" . \Carbon\Carbon::now()->format('d/m/Y')." - " .\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }

    public function buscar_paciente(Request $request){
        $ci= $request->ci;
        $paciente = Paciente::where('ci',$ci)->first();
        return view('admin.historial.buscar_paciente', compact('ci','paciente'));
    }
    
    public function imprimir_historial($id){
        $configuracion = configuracione::latest()->first();

        $paciente = Paciente::find($id);
        
        $historiales = Historials::where('paciente_id', $id)->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.historial.imprimir_historial', compact('configuracion','historiales','paciente'));
        
        //incluir la numeracion de pagina y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null,10,array(0,0,0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null,10,array(0,0,0));
        $canvas->page_text(450, 800, "Fecha:" . \Carbon\Carbon::now()->format('d/m/Y')." - " .\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
    
}
