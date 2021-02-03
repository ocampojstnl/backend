@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
<div class="container justify-content-center">
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success text-center">
                {{session()->get('message')}}
            </div>
        @endif
    </div>
    <div class="col-8 mx-auto">
         @if(!session()->has('message'))
        <h2>
        Contact us
        </h2>
       
        <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Name" value="{{old('Name')}}" name="name" class="form-control">
                    {{$errors->first('name')}}
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" value="{{old('email')}}" name="email" class="form-control">
                    {{$errors->first('email')}}

                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="text" value="{{old('message')}}" rows="8" placeholder="Message" name="message" class="form-control"></textarea>
                    {{$errors->first('message')}}
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary form-control">Send</button>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection