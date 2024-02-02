<?php

namespace App\Models;


use App\Models\NTA;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department(){

        return $this->belongsTo(Department::class);
    }

    public function nta_level(){

        return $this->belongsTo(NTA::class, 'n_t_a_level_id');
    }
    
    public function student(){

        return $this->hasMany(Student::class);
    }
}