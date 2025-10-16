<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function store(Request $r, Assignment $assignment) {
        $r->validate([
            'file'=>'nullable|file|max:10240',
            'comment'=>'nullable|string|max:2000'
        ]);
        $path = null;
        if ($r->hasFile('file')) {
            $path = $r->file('file')->store('submissions','public');
        }
        $s = Submission::updateOrCreate(
            ['assignment_id'=>$assignment->id,'student_id'=>$r->user()->id],
            ['file_path'=>$path,'comment'=>$r->comment,'submitted_at'=>now()]
        );
        return response()->json($s);
    }

    public function grade(Request $r, Submission $submission) {
        $r->validate(['grade'=>'required|integer|min:0|max:100','feedback'=>'nullable|string']);
        $submission->update(['grade'=>$r->grade,'feedback'=>$r->feedback]);
        return response()->json(['ok'=>true]);
    }
}
