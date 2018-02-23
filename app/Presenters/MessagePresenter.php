<?php 

	
namespace App\Presenters;

use Illuminate\Support\HtmlString;
use App\Message;

	class MessagePresenter extends Presenter
	{
		protected $model;

		function __construct(Message $model)
		{
			$this->model = $model;
		}

		 public function userName(){
	    	if($this->model->user_id){
	    		return $this->userLink();
	    	}
	    	return $this->model->nombre;
	    }

	    public function userEmail(){
	    	if($this->model->user_id){
	    		return $this->model->user->email;
	    	}
	    	return $this->model->email;
	    }

	    public function link(){
	    	return new HtmlString("<a href='". route('mensajes.show', $this->model->id) ."'>". $this->model->mensaje ."</a>");
	    }

	    public function userLink(){
	    	return 	$this->model->user->present()->link();
	    }

	    public function tags(){

	    	return $this->model->tags->pluck('name')->implode(', ');
	    }

	    public function notes(){
	    	return $this->model->note ? $this->model->note->pluck('body')->implode('') : '';
	    }
	}
	
?>