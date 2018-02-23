<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\MessagePresenter;

class Message extends Model
{

	protected $fillable = ['nombre', 'email', 'mensaje'];
    //


    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function note(){

    	return $this->morphMany(Note::class, 'notable');
    }

    public function tags(){
    	return $this->morphToMany(Tag::class, 'taggable');
    }

    public function present(){
    	return new MessagePresenter($this);
    }


}
