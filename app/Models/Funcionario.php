<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $guarded = ['empresa_id'];

    protected $table = "funcionarios";

    public function empresa() {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
    public function getNomeCompletoAttribute() {
        return $this->nome . " " . $this->sobrenome;
    }
}
