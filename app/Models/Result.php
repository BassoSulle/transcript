<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){

        return $this->belongsTo(Student::class, 'student_reg_no');
    }

    public function lecturer(){

        return $this->belongsTo(Grade::class, 'staff_id');
    }
    
    public function module(){

        return $this->belongsTo(Module::class, 'module_id');
    }

    public function grade(){

        return $this->belongsTo(Grade::class, 'grade_id');
    }
    
}