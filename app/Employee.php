<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'emp_id', 'name_prefix', 'first_name', 'middle_name', 'last_name', 'gender', 'email', 'father_name', 'mother_name', 'mother_maiden_name', 'date_of_birth', 'date_of_joining', 'salary', 'ssn', 'phone_no', 'city', 'state', 'zip', 'created_at', 'updated_at'
    ];
}
