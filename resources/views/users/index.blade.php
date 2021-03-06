@extends('layout')


@section('contenido')
	<h1> Usuarios</h1>

	<a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Role</th>
				<th>Nota</th>
				<th>Etiquetas</th>
				<th>Acciones</th
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td> {{ $user->id }}</td>	
					<td> {!! $user->present()->link()  !!} </td>
					<td> {{ $user->email }}</td>
					<td> {{ $user->present()->roles() }}</td>
					<td> {{ $user->present()->notes() }} </td>
					<td>{{ $user->present()->tags() }}</td>
					<th>
						<a class="btn btn-info btn-xs"  
							href="{{ route('usuarios.edit', $user->id ) }}"> Editar </a>

						<form style="display:inline"
								 method="POST" 
								 action=" {{  route('usuarios.destroy', $user->id ) }}"> 
							{!! method_field('DELETE')!!}			
							{!! csrf_field() !!}

							<button class="btn btn-danger btn-xs" type="submit" >Eliminar </button>
						</form>
					</th>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop