<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::create([
            'first_name' => "Bashir",
            'middle_name' => "Basso",
            'surname' => "Maduka",
            'email'=>"georgemaduka92@gmail.com",
            'gender'=>"male",
            'role'=>"administrator",
            'password'=>bcrypt("12345"),
            'remember_token'=>Str::random(60),
            ]);
    }
}
