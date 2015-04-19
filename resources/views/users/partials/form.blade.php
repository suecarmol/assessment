<div class="col-md-12"> 
	<div class="box box-primary">
		<div class="box-header">

			@if(isset($user))
				<h3 class="box-title">Actualizar {{$user->name}} {{ $user->last_name }}</h3>
			@else
				<h3 class="box-title">Crear Usuario</h3>
			@endif
		</div>
		
		<div class="box-body">

			{{--check if user has selected create or update --}}
			@if(isset($user))
				{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
			@else
				{!! Form::open(['route' => 'users.store']) !!}
			@endif	
				<div class="form-group">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', null, [
						'class' => 'form-control',
						'placeholder' => 'Nombre'
					]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('last_name', 'Apellidos') !!}
					{!! Form::text('last_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Apellidos'
					]) !!}
				</div>
				{!! Form::label('email', 'Correo electr&oacute;nico') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-fw fa-envelope"></i></div>
					{!! Form::email('email', null, [
						'class' => 'form-control',
						'placeholder' => 'Correo electr&oacute;nico'
					]) !!}
				</div>
				{!! Form::label('password', 'Contrase&ntilde;a') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-fw fa-key"></i></div>
					{!! Form::password('password',[
						'class' => 'form-control',
						'placeholder' => 'Contrase&ntilde;a'
					]) !!}
				</div>
				<div class="form-group">	
					{!! Form::label('company', 'Compa&ntilde;&iacute;a') !!}
					{!! Form::text('company', null, [
						'class' => 'form-control',
						'placeholder' => 'Compa&ntilde;&iacute;a'
					]) !!}
				</div>
				{!! Form::label('user_type', 'Tipo de usuario') !!}
				<div class="input-group">	
					<div class="input-group-addon"> <i class="fa fa-fw fa-user"></i></div>
					{!! Form::select('user_type', [
						'admin' => 'Administrador', 
						'maintenance' => 'Mantenimiento',
						'billing' => 'Cobranza',
						'client_service' => 'Atenci&oacute;n a clientes',
						'logistics' => 'Log&iacute;stica',
						'client' => 'Cliente'
						], null,[
						'class' => 'form-control'
					]) !!}
				</div>
			</div>
				<div class="box-footer">
					@if(isset($user))
						{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
					@else
						{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
					@endif	
				</div>
			{!! Form::close() !!}
			
	</div>
</div>

