<?php 

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    //
    private $request;
    public function __construct(){
    	//$this->middleware('example', ['only' => ['home']]);
    }

    public function home(){
    	return view('home');
    }

    // public function contactos(){
    // 	return view('contactos');
    // }

    // public function mensajes (CreateMessageRequest $request){
    // 	$data =  $request->all();
    // 	//return response()->json(['data' => $data], 202);
    // 	return back()
    // 		   ->with('info', 'Tu mensaje ha sido enviado');
    // 	//Redireccion

    // }

    public function saludo($nombre = "Invitado"){
    	$html = "<h2>Contenido html </h2>";

		$script = "<script> alert('Problema XSS - Cross Site Scripting!')</script> ";

		$consolas = [
			"Play Station 4",
			"Xbox One",
			"Wii U" 
		];
		return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
    }



}
