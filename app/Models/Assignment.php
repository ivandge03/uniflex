<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable=['course_id','title','description','due_at','max_points'];
    protected $casts=['due_at'=>'datetime'];
    public function course(){ return $this->belongsTo(Course::class); }
    public function submissions(){ return $this->hasMany(Submission::class); }
}
