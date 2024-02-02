<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_semister_modules extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course(){

        return $this->belongsTo(Course::class, 'course_id');
    }

    public function semister(){

        return $this->belongsTo(Semister::class, 'semister_id');
    }
}