<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permisos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:permissions,name',
        ]);

        Permission::create(['name'=>$request->name]);

        return redirect()->route('admin.permisos.index')
        ->with('mensaje','se registro el permiso de la manera correcta')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permisos = Permission::find($id);
        return view('admin.permisos.show', compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permisos = Permission::find($id);
        return view('admin.permisos.edit', compact('permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:permissions,name,'.$id
        ]);

        $permisos = Permission::find($id);
        $permisos->update(['name'=>$request->name]);

        return redirect()->route('admin.permisos.index')
        ->with('mensaje','se actualizo el permiso de la manera correcta')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permisos = Permission::find($id);
        $permisos->delete();

        return redirect()->route('admin.permisos.index')
        ->with('mensaje','se elimino el permiso de la manera correcta')
        ->with('icono','success');
    }
}
