<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        //disable foreign key check for this connection before running seeders
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('staffs')->delete();

        User::create([
            'first_name' => "Bashir",
            'middle_name' => "Basso",
            'surname' => "Maduka",
            'email'=>"georgemaduka92@gmail.com",
            'gender'=>"male",
            'role'=> "Admin",
            'password'=> bcrypt("12345"),
            'remember_token'=> Str::random(60),
            ]);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
