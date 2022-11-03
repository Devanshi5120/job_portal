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
        <h1 class="h3 mt-2 text-gray-800" style=" font-size:40px; font-weight:bold; text-align: center;">Edit Category</h1>

        {!! Form::model($jobcategory, ['method' => 'PUT', 'route' => ['jobcategory.update', $jobcategory->id]]) !!}

                <div class="mb-3">
                  <strong>Edit Jobcategory Name</strong>
                  {!! Form::text('name', null, ['placeholder' => 'Edit Category Name', 'class' => 'form-control', 'maxlength' => '25']) !!}
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>

                <a class="btn btn-primary" href="{{ route('jobcategory.index') }}" style="margin-left: 1px;"> Back</a>
                <button type="submit" class="btn btn-primary" style="background: green;">Update</button>

        </div>
    </div>

{!! Form::close() !!}
</div>

@endsection
@section('scripts')
    
@endsection
