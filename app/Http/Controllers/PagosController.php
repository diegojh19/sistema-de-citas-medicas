<?php

namespace App\Http\Controllers;

use App\Models\configuracione;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;




class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pagos::all();
        $total_monto = Pagos::sum('monto');
        return view('admin.pagos.index', compact('pagos','total_monto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        return view('admin.pagos.create', compact('pacientes','doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required',
            'descripcion' => 'required',

        ]);

        $pago = new Pagos();
        $pago->monto  = $request->monto;
        $pago->fecha_pago  = $request->fecha_pago;
        $pago->descripcion  = $request->descripcion;
        $pago->paciente_id  = $request->paciente_id;
        $pago->doctor_id  = $request->doctor_id;

        $pago->save();

        return redirect()->route('admin.pagos.index')
       ->with('mensaje','se registro el pago de la manera correcta')
       ->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $pago = Pagos::find($id);
        return view('admin.pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $pago = Pagos::find($id);
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        return view('admin.pagos.edit', compact('pago','doctores','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required',
            'descripcion' => 'required',

        ]);

        $pago = Pagos::find($id);
        $pago->monto  = $request->monto;
        $pago->fecha_pago  = $request->fecha_pago;
        $pago->descripcion  = $request->descripcion;
        $pago->paciente_id  = $request->paciente_id;
        $pago->doctor_id  = $request->doctor_id;

        $pago->save();

        return redirect()->route('admin.pagos.index')
       ->with('mensaje','se actualizo el pago de la manera correcta')
       ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){

        $pago = Pagos::findOrFail($id);
        return view('admin.pagos.delete', compact ('pago'));
    }
    public function destroy( $id)
    {
        Pagos::destroy($id);

        return redirect()->route('admin.pagos.index')
        ->with('mensaje','se elimino el pago sde la manera correcta')
        ->with('icono','success');
    }

    public function pdf($id)
    {
        $configuracion = configuracione::latest()->first();

        $pago = Pagos::find($id);

        $data = "Código de seguridad del comprobante de pago"
        .$pago->paciente->apellidos." ".$pago->paciente->nombre
        ." en fecha ".$pago->fecha_pago." con el monto de ".$pago->monto;
        
        //GENERAR CODIGO QR
        $qrCode = new QrCode($data);
        $writer =  new PngWriter();
        $result = $writer->write($qrCode);
        $qrCodeBase64 = base64_encode($result->getString());


        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pagos.pdf', compact('configuracion','pago','qrCodeBase64'));
        
        //incluir la numeracion de pagina y el pie de página
        
        return $pdf->stream();
    }
}
