<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer_module extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function module(){

        return $this->belongsTo(Module::class, 'module_id');
    }

    public function semister(){

        return $this->belongsTo(Module::class, 'semister_id');
    }

}