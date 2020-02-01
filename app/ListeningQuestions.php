<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningQuestions extends Model
{
    public function sets(){
    	return $this->belongsTo('App\QuestionSets');
    }
    public function listeningOptions(){
    	return $this->hasMany('App\ListeningOptions');
    }
}
