@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')


{{-- main content  --}}

<div class="card-body">
    <div class="row">
        <div class="col-4">
        </div>
        
        <div class="col-4" style="background-color: #fff; padding: 50px 50px 50px 50px; margin-top: 50px;">
        <h1 class="h3 mt-2 text-gray-800" style=" font-size:40px; font-weight:bold; text-align: center;">Edit ContactInfo</h1>

        {!! Form::model($contactinfo, ['method' => 'PUT', 'route' => ['contactinfo.update', $contactinfo->id]]) !!}

                <div class="mb-3">
                  <strong>Edit Address</strong>
                  {!! Form::text('address', null, ['placeholder' => 'Edit address', 'class' => 'form-control', 'maxlength' => '25']) !!}
                  @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>

                <div class="mb-3">
                    <strong>Edit Email</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Edit Email', 'class' => 'form-control', 'maxlength' => '25']) !!}
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>

                  
                <div class="mb-3">
                    <strong>Edit Mobile No</strong>
                    {!! Form::text('mobileno', null, ['placeholder' => 'Edit Mobile No', 'class' => 'form-control', 'maxlength' => '25']) !!}
                    @error('mobileno')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>

                <a class="btn btn-primary" href="{{ route('contactinfo.index') }}" style="margin-left: 1px;"> Back</a>
                <button type="submit" class="btn btn-primary" style="background: green;">Update</button>

        </div>
    </div>

{!! Form::close() !!}
</div>

@endsection
@section('scripts')
    
@endsection
