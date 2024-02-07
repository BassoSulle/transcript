<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_semister_modules extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function acYear(){

        return $this->belongsTo(\App\Models\academicYearProgress::class, 'ac_year_id');
    }

    public function course(){

        return $this->belongsTo(Course::class, 'course_id');
    }

    public function semister(){

        return $this->belongsTo(Semister::class, 'semister_id');
    }
}