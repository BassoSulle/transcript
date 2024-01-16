<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course(){

        return $this->hasMany(Course::class);
  }
}
