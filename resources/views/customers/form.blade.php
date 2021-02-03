@csrf
<div class="form-group">
    <label for="">Name <span class="text-danger">*</span></label>
  <input type="text" name="name" value="{{old('name') ?? $customer->name}}" placeholder="name" class="form-control">
    <div class="text-danger">{{$errors->first('name')}}</div>
  </div>
  <div class="form-group">
    <label for="">Email <span class="text-danger">*</span></label>
    <input type="email" name="email" value="{{old('email') ?? $customer->email}}" placeholder="email" class="form-control">
    <div class="text-danger">{{$errors->first('email')}}</div>
  </div>
  <div class="form-group">
    <label for="Active">Status <span class="text-danger">*</span></label>
    <select name="active" class="form-control" id="">
      <option value="" disabled>Select Customer status</option>
      {{-- <option value="1" {{$customer->active == 1 ? 'Selected' : ''}}>Active</option>
      <option value="0" {{!$customer->active == 1 ? 'Selected' : ''}}>Inactive</option> --}}
      {{-- <option value="1" {{$customer->active == 'Active' ? 'Selected' : ''}}>Active</option>
      <option value="0" {{$customer->active == 'Inactive' ? 'Selected' : ''}}>Inactive</option> --}}
      @foreach($customer->activeOptions() as $activeKey => $activeValue)
        <option value="{{$activeKey}}" {{!($customer->active == $activeKey) ? '' : 'Selected'}}>{{$activeValue}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Company <span class="text-danger">*</span</label>
    <select name="company_id" id="" class="form-control">
      @foreach($companies as $company)
        <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'Selected' : ''}}>{{$company->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Profile image</label>
    <br>
    <input type="file" name="image">
    <div class="text-danger">{{$errors->first('image')}}</div>
  </div>
  <div class="form-group">
    <button class="btn btn-sm btn-primary" type="submit">Save data</button>
  </div>
