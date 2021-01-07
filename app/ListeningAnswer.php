<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningAnswer extends Model
{
    public function ListeningQuestion(){
    	return $this->belongsTo('App\ListeningQuestion');
    }

    public function ListeningOption(){
    	return $this->belongsTo('App\ListeningOptions');
    }
}
