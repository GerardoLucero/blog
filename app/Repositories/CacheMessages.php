<?php 

namespace App\Repositories;
use Illuminate\Support\Facades\Cache;

	class CacheMessages implements MessagesInterface{


		protected $messages;

		public function __construct(Messages $messages){

			$this->messages = $messages;
		}

		public function getPaginated(){

			return Cache::tags('messages')->rememberForever('messages.all', function(){
             	return $this->messages->getPaginated();
         	});
		}

		public function store($request){
			$messages = $this->messages->store($request);
	        Cache::tags('messages')->flush();
	        return $messages;
		}

		public function findById($id){
			return Cache::tags('messages')->rememberForever("menssages.{$id}", function() use ($id){
		            return $this->messages->findById($id);
		    });
		}

		public function update($request, $id){
			$messages = $this->messages->update($request, $id);
			Cache::tags('messages')->flush();
			return $messages;
        	
		}

		public function destroy($id){
			$messages = $this->messages->destroy($id);
			Cache::tags('messages')->flush();
			return $messages;
        	
		}



	}



?>