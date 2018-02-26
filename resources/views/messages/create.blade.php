@extends('layout')

@section('contenido')
	<h1>Contactos</h1>

	

	@if(session()->has('info'))
		<h3> {{session('info')}} </h3>
		{{ session()->flush() }}
	@else
		<h2>Escríbeme</h2>
		<form method="POST" action=" {{ route('mensajes.store') }}"> 
			@include('messages.form', 

			['message' => new  App\Message,
			 'showFields' => auth()->guest()])
		</form>
	@endif
@stop
	