<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class index_controller extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function departments(){
        return view('staff.departments');
    
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

}