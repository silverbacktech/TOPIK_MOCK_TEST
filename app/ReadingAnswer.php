<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingAnswer extends Model
{
    public function ReadingQuestion(){
    	return $this->belongsTo('App\ReadingQuestion');
    }

    public function ReadingOption(){
    	return $this->belongsTo('App\ReadingOptions');
    }
}
