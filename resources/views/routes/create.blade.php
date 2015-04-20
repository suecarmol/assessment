@extends('app')
	@include('includes.logistics.sidebar')
	@section('content')
		@include('routes.partials.form')

	@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif	
	@stop