<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagasSolicitada extends Model
{
    use HasFactory;

    protected $table = 'vagas_solicitadas';

    protected $fillable = [
        'solicitante',
        'departamento',
        'cargo',
        'tipo_vaga',
        'tipo_contrato',
        'status', 
        'codigo',
        'quantidade',
        'data_solicitacao'
    ];

    public function departamento()
    {
        return $this->belongsTo(Department::class, 'departamento','id');
    }
    public function cargo()
    {
        return $this->belongsTo(Office::class, 'cargo','id');
    }
    public function solicitante()
    {
        return $this->belongsTo(User::class, 'solicitante','id');
    }
    public function tipo_vaga()
    {
        return $this->belongsTo(Vacancy::class, 'tipo_vaga','id');
    }
    public function tipo_contato()
    {
        return $this->belongsTo(ContractType::class, 'tipo_contrato','id');
    }
}
