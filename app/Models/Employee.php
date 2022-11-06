<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory,
        SerializeDate;

    protected $guarded = ['id', 'created_at'];
    protected $fillable = ['name', 'name_kana', 'gender','age','updated_at'];
}
