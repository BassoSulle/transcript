<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class index_controller extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function module(){
        return view('module');
    }

    public function semister(){
        return view('semister');
    }

    public function department(){
        return view('department');
    }

    public function course(){
        return view('course');
    }

    public function grade(){
        return view('grade');
    }
    public function student(){
        return view('student');
    }
    // public function student_dashboard(){
    //     return view('layouts.student');
    // }

    // public function staff_dashboard(){
    //     return view('layouts.staff');
    // }




    public function staffs(){
        return view('staff');

    }

    public function add_staff(){
        return view('add_staff');

    }

    public function edit_staff($staff){
        return view('edit_staff', compact('staff'));

    }

    public function nta_levels(){
        return view('nta_level');

    }

    public function awards(){
        return view('award');

    }

    public function courseSemisterModules(){
        return view('course_semister_modules');

    }

    public function addCourseSemisterModules(){
        return view('add_course_semister_modules');

    }

    public function editCourseSemisterModules($course){
        return view('edit_course_semister_modules', compact('course'));

    }

    public function assignModules($staff){
        return view('assign_modules', compact('staff'));

    }

}
