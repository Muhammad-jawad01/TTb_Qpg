<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperQuestion extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public function paper()
    {
        return $this->belongsTo(Paper::class ,'paper_id','id');
    }
    public function paperpart()
    {
        return $this->belongsTo(PaperPart::class ,'paper_parts_id','id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class ,'question_id','id');
    }
}