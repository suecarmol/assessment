@extends('app')
	@if(\Auth::user()->user_type == 'admin')
	 @include('includes.admin.sidebar')
  @else
    @include('includes.billing.sidebar') 
  @endif 
	@section('content')
		@include('products.partials.form')
		@if($errors->has())
	    <div class="callout callout-danger">
	    	<h4>Error</h4>

	    	 @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        	@endforeach
	    </div>
	  @endif
	@stop