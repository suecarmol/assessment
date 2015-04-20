@extends('app')

	@if(\Auth::user()->user_type == 'admin')
	 @include('includes.admin.sidebar')
  @elseif(\Auth::user()->user_type == 'maintenance') 
    @include('includes.maintenance.sidebar')
  @else
    @include('includes.logistics.sidebar')
  @endif  
  
	@section('content')
		@include('trucks.partials.form')

	@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif
	  	
	@stop