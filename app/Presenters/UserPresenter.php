<?php 

	
namespace App\Presenters;

use Illuminate\Support\HtmlString;
use App\User;

	class UserPresenter extends Presenter
	{
		protected $model;

		function __construct(User $model){
			$this->model = $model;
		}

	    public function link(){

	    	return new HtmlString("<a href='". route('usuarios.show', $this->model->id) ."'>". 
	    			$this->model->name 
	    			."</a>");
	    }


	    public function roles(){
	    	return $this->model->roles->pluck('display_name')->implode(', ');
	    }

	    public function notes(){
	    	return  $this->model->note ? $this->model->note->pluck('body')->implode('') : '';
	    }

	    public function tags(){
	    	return  $this->model->tags->pluck('name')->implode(', ');
	    }




	}
	
?>