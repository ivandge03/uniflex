<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;

class CourseController extends Controller
{
    public function index(Request $r) {
        $q = Course::withCount('assignments')->orderByDesc('id');
        return response()->json($q->paginate(20));
    }

    public function store(Request $r) {
        $data = $r->validate([
            'code'=>'required|string|max:50|unique:courses,code',
            'title'=>'required|string|max:255',
            'description'=>'nullable|string'
        ]);
        $data['owner_id'] = $r->user()->id;
        $c = Course::create($data);
        return response()->json($c, 201);
    }

    public function show(Course $course) {
        $course->load('materials','assignments');
        return response()->json($course);
    }

    public function enroll(Request $r, Course $course) {
        Enrollment::updateOrCreate(['user_id'=>$r->user()->id,'course_id'=>$course->id], ['status'=>'approved']);
        return response()->json(['ok'=>true]);
    }
}
