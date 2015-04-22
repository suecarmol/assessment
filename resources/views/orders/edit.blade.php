@extends('app')
	@if(\Auth::user()->user_type == 'client_service')
		@include('includes.client_service.sidebar')
	@else
		@include('includes.clients.sidebar')
	@endif		
	@section('content')
		@include('orders.partials.form')
		@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif
	@stop