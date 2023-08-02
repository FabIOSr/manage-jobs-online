<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'alias_name',
        'social_name',
        'zipcode',
        'street',
        'neigborhood',
        'city',
        'state',
        'number',
        'status',
        'company_id',
        'addSSSed_by',
        'updated_by'
    ];
}
