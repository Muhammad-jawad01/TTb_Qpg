<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperPart extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function paper()
    {
        return $this->belongsTo(Paper::class ,'paper_id','id');
    }
    public function paperquestion(){
        
        return $this->hasMany(PaperQuestion::class,'paper_parts_id');
    }

    public static function boot() {

	    parent::boot();
	    // static::deleted(function($item) {
	    //     \PaperQuestion::where('paper_id'.$item->paper_id);
	    // });

        static::deleting(function($item) {
	        \PaperQuestion::where('paper_id'.$item->paper_id)->delete();
	    });
	    
	}
}