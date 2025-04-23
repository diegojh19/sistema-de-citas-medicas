<?php

namespace App\Http\Controllers;

use App\Models\configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Secretaria;


class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorio = Consultorio::count();
        $total_doctor = Doctor::count();
        $total_horarios = Horario::count();
        $total_eventos = Event::count();
        $total_configuracion = configuracione::count();


        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $eventos = Event::all();



        return view('admin.index', 
        compact('total_usuarios',
         'total_secretarias',
         'total_pacientes',
         'total_consultorio',
         'total_doctor', 
         'total_horarios',
         'consultorios',
         'doctores',
         'eventos',
         'total_eventos',
         'total_configuracion'));
    }

    public function ver_reservas($id){
        $eventos = Event::where('user_id',$id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }
}
