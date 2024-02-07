<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'students';

     protected $fillable = [
        'first_name',
        'middle_name',
        'surname',
        'role',
        'course_id',
        'gender',
        'email',
        'dob',
        'passport_size',
        'password',
    ];
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */

     protected $hidden = [
         'password',
         'remember_token',
     ];
 
     /**
      * The attributes that should be cast.
      *
      * @var array<string, string>
      */

     protected $casts = [
         'email_verified_at' => 'datetime',
     ];

    public function course(){
        return $this->belongsTo(Course::class);
        
    }
}