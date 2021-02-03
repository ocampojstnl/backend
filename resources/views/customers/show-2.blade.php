@extends('layouts.app')
@section('title', $customer->name)
@section('content')
<div class="row">
    <div class="col-12 mx-0">
    	<div class="alert alert-success d-flex col-12">
    		<div class="col-8 d-flex">
    			<h2>{{$customer->name}}</h2>
    		</div>
    		<div class="col-4 d-flex flex-row-reverse">
	        	<form action="{{route('customers.destroy', ['customer' => $customer])}}" method="POST">
	            	@csrf
	            	@method('DELETE')
	            	<button type="submit" class="btn btn-sm btn-default">
	                	<i class="fa fa-trash h4 text-danger"></i>
	            	</button>
	        	</form>
		        <a href="{{route('customers.edit', ['customer' => $customer])}}" >
	            	<button class="btn btn-sm btn-default mr-1">
	                	<i class="fa fa-edit h4 text-success"></i>
	            	</button>
	        	</a>
    		</div>
    	</div>
    </div>
    <div class="col-12 d-flex">
        <div class="col-6">
        	<div class="col-6 mt-1">
        		<h3>Email </h3>
        		<h5>{{$customer->email}}</h5>
        	</div>
        	<div class="col-6 mt-4">
        		<h3>Company</h3>
        		<h5>{{$customer->company->name}}</h5>
        	</div>
        	
        </div>
        <div class="col-6 d-flex alert alert-success py-5" >
			@if(!$customer->image == null)
				<img height="200px" class="rounded-circle mx-auto" width="200px" src="{{ asset('storage/'.$customer->image) }}" />
        	@else 
				<img height="200px" class="rounded-circle mx-auto" width="200px" src="{{ asset('images/default.png') }}" />
        	@endif
        </div>
    </div>
    </div>
  </div>
 
@endsection