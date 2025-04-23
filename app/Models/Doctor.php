<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['nombres','apellidos','telefono','licencia_medica','espacialidad','user_id'];
    protected $guard_name = 'web';
    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function historial(){
        return $this->hasMany(Historials::class);
    }

    public function pagos(){
        return $this->hasMany(Pagos::class);
    }
}

        
