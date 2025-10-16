<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@uniflex.test'], [
            'name'=>'Admin', 'password'=>Hash::make('Admin!234'),
        ]);
        User::updateOrCreate(['email'=>'student@uniflex.test'], [
            'name'=>'Student', 'password'=>Hash::make('Stud!234'),
        ]);
    }
}
