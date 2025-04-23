<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Console\View\Components\Secret;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       $this->call([RoleSeeder::class]);

       User::create([
            'name'=> 'Administrador',
            'email'=> 'admin@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');

        User::create([
            'name'=> 'Secretaria',
            'email'=> 'secretaria@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=> 'secretaria1',
            'apellidos'=> 'secretaria1',
            'ci'=> '11',
            'celular'=> '4567',
            'fecha_nacimiento'=> '10/10/2001',
            'direccion'=> 'calle 12',
            'user_id'=> '2',

        ]);

        
        User::create([
            'name'=> 'Doctor',
            'email'=> 'doctor@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=> 'pedro',
            'apellidos'=> 'pedraza',
            'telefono'=> '87654',
            'licencia_medica'=> '765',
            'especialidad'=> 'pediatria',
            'user_id' => '3'

        ]);

        User::create([
            'name'=> 'Doctor2',
            'email'=> 'doctor2@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=> 'Doctor2',
            'apellidos'=> 'Doctor2',
            'telefono'=> '44487654',
            'licencia_medica'=> '345765',
            'especialidad'=> 'pediatria',
            'user_id' => '4'

        ]);

        User::create([
            'name'=> 'Doctor3',
            'email'=> 'doctor3@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=> 'Doctor3',
            'apellidos'=> 'Doctor3',
            'telefono'=> '5587654',
            'licencia_medica'=> '55345765',
            'especialidad'=> 'pediatria',
            'user_id' => '5'

        ]);

        Consultorio::create([
            'nombre'=> 'pediatria',
            'ubicacion'=> 'consultorio 101',
            'capacidad'=> '5',
            'especialidad'=> 'pediatria',
            'telefono'=>'2654',
            'estado'=> 'ACTIVO',
        ]);
        Consultorio::create([
            'nombre'=> 'odontologia',
            'ubicacion'=> 'consultorio 102',
            'capacidad'=> '6',
            'especialidad'=> 'odontologia',
            'telefono'=>'876',
            'estado'=> 'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'=> 'fisioterapia',
            'ubicacion'=> 'consultorio 103',
            'capacidad'=> '6',
            'especialidad'=> 'fisioterapia',
            'telefono'=>'5889636',
            'estado'=> 'ACTIVO',
        ]);

        User::create([
            'name'=> 'Paciente',
            'email'=> 'paciente@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name'=> 'Usuario',
            'email'=> 'usuario@gmail.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario');

        $this->call([PacienteSeeder::class]);


        //HORARIOS

        Horario::create([
            'dias' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '14:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1'

        ]);

        configuracione::create([
            'nombre' => 'Clinica Hilari',
            'direccion' => 'Zona Miraflores Av 5 Calle Mejilleros Nro 200',
            'telefono' => '987657698',
            'correo' => 'info@gmail.com',
            'logo' => 'logos/QX7CN9zFXUS7Bpua7bFVoTiwjUnIa8QKx5niqJcB.jpg',


        ]);
        
    }
}
