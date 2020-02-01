<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningAnswer extends Model
{
    public function listeningQuestion(){
    	return $this->belongsTo('App\ListeningQuestions');
    }
}
