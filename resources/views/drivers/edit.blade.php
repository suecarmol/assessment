@extends('app')
	@include('includes.client_service.sidebar')
	@section('content')
		@include('drivers.partials.form')

	@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif	
	@stop