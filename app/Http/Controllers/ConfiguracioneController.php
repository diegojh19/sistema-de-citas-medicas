<?php

namespace App\Http\Controllers;

use App\Models\configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\TestRunner\Configured;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = configuracione::all();
        return view('admin.configuraciones.index',compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required',
            'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
            
       ]);

       $configuracion = new Configuracione();

       $configuracion->nombre = $request->nombre;
       $configuracion->direccion = $request->direccion;
       $configuracion->telefono = $request->telefono;
       $configuracion->correo = $request->correo;
       if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
        $configuracion->logo = $request->file('logo')->store('logos', 'public');
    } else {
        return back()->withErrors(['logo' => 'El logo debe ser una imagen válida.']);
    }

       $configuracion->save();

       return redirect()->route('admin.configuraciones.index')
       ->with('mensaje','se registro la configuración de la manera correcta')
       ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $configuracion = configuracione::find($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $configuracion = Configuracione::find($id);
        return view('admin.configuraciones.edit', compact ('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nombre'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required',
           // 'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
            
       ]);

       $configuraciones = Configuracione::find($id);

       $configuraciones->nombre = $request->nombre;
       $configuraciones->direccion = $request->direccion;
       $configuraciones->telefono = $request->telefono;
       $configuraciones->correo = $request->correo;
       
       if ($request->hasFile('logo')) {
        if ($request->file('logo')->isValid()) {
            // Eliminamos la imagen anterior si existe
            if ($configuraciones->logo && Storage::exists('public/' . $configuraciones->logo)) {
                Storage::delete('public/' . $configuraciones->logo);
            }
    
            $configuraciones->logo = $request->file('logo')->store('logos', 'public');
        } else {
            return back()->withErrors(['logo' => 'El logo debe ser una imagen válida.']);
        }
    }
    
       
       $configuraciones->save();

       return redirect()->route('admin.configuraciones.index')
       ->with('mensaje','se actualizo la configuracion de la manera correcta')
       ->with('icono','success');
    }

    public function confirmDelete($id){

        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuraciones.delete', compact ('configuracion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $configuracion = Configuracione::find($id);
        Storage::delete('public/' . $configuracion->logo);
        $configuracion->delete();

        return redirect()->route('admin.configuraciones.index')
        ->with('mensaje','se elimino la configuracion de la manera correcta')
        ->with('icono','success');
    }
}
