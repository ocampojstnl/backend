@extends('layouts.app')
@section('title', 'edit')
@section('content')
<div class="row">
    <div class="col-12 d-flex">
      <div class="col-8 mx-auto">
        <h2>Edit {{$customer->name}}</h2>
      <form action="{{route('customers.update', $customer)}}" enctype="multipart/form-data" method="POST">
          @method('PATCH')
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