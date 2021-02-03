@extends('layouts.app')
@section('title', 'Details of ' . $customer->name)
@section('content')
<div class="row">
    <div class="col-12 d-flex">
    <div>
        <h2>{{$customer->name}}</h2>
       
        <p>Email : {{$customer->email}} </p>
        <p>Company : {{$customer->company->name}}</p>
    </div>
    <div class="col-6 d-flex flex-row-reverse">
        <form action="{{route('customers.destroy', ['customer' => $customer])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </form>
        <a href="{{route('customers.edit', ['customer' => $customer])}}" >
            <button class="btn btn-sm btn-primary mr-1">
                <i class="fa fa-edit"></i>
            </button>
        </a>
    </div>
    </div>
  </div>
 
@endsection