<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function partPart(){

        return $this->hasMany(PaperPart::class,'paper_id');
    }
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

    public function paperquestion(){
        
        return $this->hasMany(PaperQuestion::class,'paper_id');
    }

    public static function boot() {

	    parent::boot();
	    
        static::deleting(function($paper) {
            $paper->paperquestion()->delete();
            $paper->partPart()->delete();


	    });

        

	    
	}

}