<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningSubmittedAnswers extends Model
{
    public function listeningQuestion(){
    	return $this->belongsTo('App\ListeningQuestions');
    }
}
