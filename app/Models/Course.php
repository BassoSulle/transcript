<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;


class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department(){

        return $this->belongsTo(Department::class);
  }
  public function student(){

    return $this->hasMany(Student::class);
}
}
