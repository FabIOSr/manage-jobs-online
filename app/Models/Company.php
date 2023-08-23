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
        'address',
        'zipcode',
        'document',
        'due_date',
        'companyID',
        'updatedBy',
        'createdBy',
        'shortName',
        'complement',
        'companyName',
        'neighbourhood',
    ];
}
