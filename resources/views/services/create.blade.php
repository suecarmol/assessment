@extends('app')
	@include('includes.maintenance.sidebar')
	@section('content')
		@include('services.partials.form')

	@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif	
	@stop