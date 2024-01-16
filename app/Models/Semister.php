<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;


class Semister extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function module(){

        return $this->hasMany(Module::class);
  }
}
