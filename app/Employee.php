<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id', 'name_prefix', 'first_name', 'middle_initial', 'last_name', 'gender', 'email', 'father_name', 'mother_name', 'mother_maiden_name', 'date_of_birth', 'date_of_joining', 'salary', 'ssn', 'phone', 'city', 'state', 'zip', 'created_at', 'updated_at'
    ];
}
