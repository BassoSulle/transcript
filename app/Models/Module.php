<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semister;


class Module extends Model
{
    use HasFactory;

    protected $guarded = [];

   public function semister(){

         return $this->belongsTo(Semister::class);
   }
}
