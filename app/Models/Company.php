<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'state',
        'owner',
        'email',
        'number',
        'status',
        'street',
        'zipcode',
        'added_by',
        'document',
        'due_date',
        'company_id',
        'complement',
        'updated_by',
        'alias_name',
        'social_name',
        'neigborhood',
    ];
}
