<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(['email'=>'admin@uniflex.test'], [
            'name'=>'Admin', 'password'=>Hash::make('Admin!234'),
        ]);
        $teacher = User::updateOrCreate(['email'=>'prof@uniflex.test'], [
            'name'=>'Prof', 'password'=>Hash::make('Prof!234'),
        ]);
        $student = User::updateOrCreate(['email'=>'student@uniflex.test'], [
            'name'=>'Student', 'password'=>Hash::make('Stud!234'),
        ]);

        $course = Course::firstOrCreate([
            'code'=>'DB101'
        ],[
            'title'=>'Intro to Databases',
            'description'=>'Основи на БД',
            'owner_id'=>$teacher->id
        ]);

        Assignment::firstOrCreate([
            'course_id'=>$course->id,
            'title'=>'HW1 ER диаграма'
        ],[
            'description'=>'Нарисувай ER диаграма.',
            'due_at'=>now()->addDays(7),
            'max_points'=>100
        ]);
    }
}
