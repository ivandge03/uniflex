<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;

class AssignmentController extends Controller
{
    public function index(Course $course) {
        return response()->json($course->assignments()->orderByDesc('id')->get());
    }

    public function store(Request $r, Course $course) {
        $data = $r->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'due_at'=>'nullable|date',
            'max_points'=>'required|integer|min:1|max:1000'
        ]);
        $data['course_id'] = $course->id;
        $a = Assignment::create($data);
        return response()->json($a, 201);
    }
}
