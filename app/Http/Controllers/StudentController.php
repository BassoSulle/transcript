<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        return view('student.index');
    }

    public function profile(){
        return view('student.student_profile');
    }

    public function module(){
        return view('student.modules');
    }

    public function academicRecords(){
        return view('student.academic_records');
    }

}