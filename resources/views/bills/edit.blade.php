@extends('app')
	@include('includes.billing.sidebar')
	@section('content')
		@include('bills.partials.form')

	@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif	
	@stop