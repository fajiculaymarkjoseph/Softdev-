<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    use HasFactory;

    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'department',
    'employee_id',
    'position',
    'date_of_birth',
    'sex',
    'civil_status',
    'contact_number',
    'address',
    'medical_conditions',
];

   
}


