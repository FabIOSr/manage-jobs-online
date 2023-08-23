<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacanciesRequested extends Model
{
    use HasFactory;

    protected $table = 'vacancies_requested';

    protected $guarded = [];



    protected $work_schedule = [
        '12x36 (180) - 07:00-19:00 - PAR',
        '12x36 (180) - 07:00-19:00 - IMPAR',
        '12x36 (180) - 19:00-07:00 - PAR',
        '12x36 (180) - 19:00-07:00 - IMPAR',
        '5x2 (44) - 07:00-17:00 - SQ - 07:00-16:00 - S',
    ];

    protected $academic_education = [
        'MEDIO',
        'TECNICO',
        'SUPERIOR'
    ];

    protected $experience_level = [
        'DESEJAVEL',
        '1 ANO',
        '2 ANOS',
        '3 ANOS'
    ];

    protected $weekly_load = [
        '36',
        '40',
        '44',
    ];

    protected $type_of_contract = [
        'EFETIVO',
        'PRAZO DETERMINADO',
        'APRENDIZ',
        'ESTAGIO',
        'TEMPORARIO - LEI 6.019',
    ];

    protected $type_of_request = [
        'SD - SUBSTITUICAO POR DISPENSA',
        'SP - SUBSTITUICAO POR PROMOCAO',
        'TC - TERMINO DE CONTRATO',
        'TREXP - REPROVACAO NA EXPERIENCIA',
        'SPD - SUBSTITUICAO POR PEDIDO DE DEMISSAO',
        'SG - SUBSTITUICAO GESTANTE'
    ];
}
