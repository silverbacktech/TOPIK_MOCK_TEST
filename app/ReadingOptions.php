<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingOptions extends Model
{
    public function readingQuestion(){
    	return $this->belongsTo('App\ReadingQuestions');
    }

    public function ReadingAnswer(){
    	return $this->hasOne('App\ReadingAnswer');
    }
}
