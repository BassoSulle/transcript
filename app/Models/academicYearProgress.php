<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academicYearProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function semister(){
 
          return $this->belongsTo(Semister::class, 'current_semister_id');
    }
    
}