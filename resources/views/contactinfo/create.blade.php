@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')
   
<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Contact Info</h1>

<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('contactinfo.store') }}">
      @csrf
      <div class="row">
        
        <div class="col-12 col-md-6 col-lg-4">
            <strong>Address</strong>
            <input type="text" name="address" class="form-control"placeholder="Address" maxlength="25" >
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror<br>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <strong>Email</strong>
            <input type="text" name="email" class="form-control" placeholder="Email" maxlength="25" >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <strong>Mobile No</strong>
            <input type="text" name="mobileno" class="form-control"placeholder="Mobile No" maxlength="25" >
            @error('mobileno')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror<br>
          </div>

         <div class="col-12 ">        
                <a class="btn btn-primary" href="{{ route('contactinfo.index') }}" style="margin-left: 130px;"> Back</a>
                <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
         </div>   
        </form>
        </div>
    </div>
</div>


    
@endsection
@section('scripts')
    
@endsection
