<?php

/*Route::get('test', function(){
	$user = new App\User;
	$user->name = 'Luis';
	$user->email = 'mod@gmail.com';
	$user->password = bcrypt('123123');
	$user->save();
	return $user;
});


Route::get('test2', function(){
	$user = new App\User;
	$user->name = 'Gerardo';
	$user->email = 'luceroriosg@gmail.com';
	$user->password = bcrypt('123123');
	$user->save();	return $user;
});

Route::get('test3', function(){
	$user = new App\User;
	$user->name = 'abc';
	$user->email = 'estudianteg@gmail.com';
	$user->password = bcrypt('123123');
	$user->save();
	return $user;
});*/



// Route::get('job', function(){
// 	dispatch(new App\Jobs\SendEmail);

// 	return "Listo!";
// });


/*DB::listen(function($query){
	echo "<pre> { $query->sql  } </pre>";

});

*/



Route::get('roles', function(){
	return App\Role::with('user')->get;
});

Route::get('/',['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}',['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes','MessagesController');

Route::resource('usuarios','UsersController');

Route::get('login', 'Auth\LoginController@showloginForm' );

Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login' ]);
//Route::post('login',  'Auth\LoginController@login' );

Route::get('logout', 'Auth\LoginController@logout');

//Route::get('mensajes',['as' => 'messages.index', 'uses' => 'MessagesController@index']);

//Route::get('mensajes/create',['as' => 'messages.create', 'uses' => 'MessagesController@create']);

//Route::post('mensajes',['as' => 'messages.store', 'uses' => 'MessagesController@store']);

//Route::get('mensajes/{id}',['as' => 'messages.show', 'uses' => 'MessagesController@show']);

//Route::get('mensajes/{id}/edit',['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);

//Route::put('mensajes/{id}',['as' => 'messages.update', 'uses' => 'MessagesController@update']);

//Route::delete('mensajes/{id}',['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);

?>
