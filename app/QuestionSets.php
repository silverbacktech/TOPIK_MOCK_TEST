<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSets extends Model
{
    public function languages(){
    	return $this->belongsTo('App\Languages');
    }

    public function listeningQuestions(){
    	return $this->hasMany('App\ListeningQuestions');
    }
}
