<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory,
        SerializeDate;

    protected $table = 'employee_profile';
    protected $guarded = ['id', 'created_at'];
    protected $fillable = ['emp_id', 'h_pay', 'tel','address','birthday','memo','updated_at'];
}
