@extends('layouts.app')
@section('title', 'create')
@section('content')
<div class="row">
    <div class="col-12 d-flex">
      <div class="col-8 mx-auto">
          <h2>Create Customers</h2>
        <form action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @include('customers.form')
        </form>
      </div>
    </div>
</div>
  @if($errors->first('name'))
    <div class="alert alert-danger text-center">
      {{$errors->first('name')}}
    </div>
  @endif
@endsection