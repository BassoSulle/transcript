<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    //
    public function index(){
        return view('lecturer.index');
    }

    public function module(){
        return view('lecturer.modules');
    }

    public function studentResults(){
        return view('lecturer.students_results');
    }

}