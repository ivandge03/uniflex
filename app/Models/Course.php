<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['code','title','description','owner_id'];

    public function owner(){ return $this->belongsTo(User::class, 'owner_id'); }
    public function materials(){ return $this->hasMany(Material::class); }
    public function assignments(){ return $this->hasMany(Assignment::class); }
    public function students(){
        return $this->belongsToMany(User::class,'enrollments')->withTimestamps()->withPivot('status');
    }
}
