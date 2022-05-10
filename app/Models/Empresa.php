<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "empresas";

    public function funcionarios() {
        return $this->hasMany('App\Models\Funcionario', 'empresa_id');
    }
}
