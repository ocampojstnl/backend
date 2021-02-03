@extends('layouts.app')

@section('title', 'Customer List')

@section('content')

<h2>Customers List</h2>

@can('create', \App\Customer::class)
  <a href="/customers/create">Create a new Customer</a>
@endcan

<?php 
$n = $customers->currentPage() > 0 ? ($customers->currentPage() - 1) * $customers->count() == 0 ? 1 : ($customers->currentPage() - 1) * $customers->count() : 1;
?>
<div class="col-12">

  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Email</th>
        <th>Name</th>
        <th>Company</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
     @foreach($customers as $customer)
      <tr>
        <td class="text-center">
          <?= 
            // $n == 20 ? $n = $n: $n++;
            $customers->currentPage() > 1 ? ++$n : $n++;
          ?>
        </td>
        <td>
          @can('view', $customer)
            <!-- <a href="#" data-toggle="modal" id="customer" data="{{$customer->email}}" data-target="#exampleModalCenter"> -->
              {{$customer->email}}
            <!-- </a> -->
          @endcan
          @cannot('view', $customer)
          {{$customer->email}}
          @endcannot
        </td>
        <td>
          @can('view', $customer)
            <a href="/customers/{{$customer->id}}">{{$customer->name}}</a>
          @endcan
          @cannot('view', $customer)
            {{$customer->name}}
          @endcannot
        </td>
        <td>{{$customer->company->name}}</td>
        <td>@if($customer->active == 'Active') 
            <span class="text-success">{{$customer->active}}</span>
            @elseif($customer->active == 'Inactive')
            <span class="text-warning">{{$customer->active}}</span>
            @else
            <span class="text-danger">{{$customer->active}}</span>
            @endif
          </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  @if($customers->count() > 0)
  <div class="container d-flex justify-content-center mt-4">
    {{$customers->links()}}
  </div>
  @endif
</div>




<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

{{-- <script>
  $(document).ready(function () {
    
    $("#customer").on('click', function () {
      $('#customer-to').val($('#customer').attr('data'));
   });
  });
</script> --}}

@endsection