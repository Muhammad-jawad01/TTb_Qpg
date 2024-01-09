<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function class()
    {
        return $this->belongsTo(ClassLevel::class ,'class_id','id');
    }
    public function term()
    {
        return $this->belongsTo(Term::class ,'term_id','id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class ,'subject_id','id');
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class ,'chapter_id','id');
    }

    
}