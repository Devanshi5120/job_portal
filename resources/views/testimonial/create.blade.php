@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')


<div class="card-body">
    
    <div class="row">
        
        <div class="col-4">
        </div>
        
        <div class="col-4" style="background-color: #fff; padding: 50px 50px 50px 50px; margin-top: 50px;">
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">About Us</h1>

            <form method="POST" action="{{ route('testimonial.store') }}"enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <strong>Image</strong>
                  <input type="file" name="image" class="form-control" >
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror<br>
                </div>

                <div class="mb-3">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name ">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>

                 <div class="mb-3">
                    <strong>Specialist</strong>
                    <input type="text" name="specialist" class="form-control" placeholder="Title ">
                  @error('specialist')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>
         

                <div class="mb-3">
                  <strong>Description</strong>
                  <textarea  name="description" class="form-control" placeholder="Description" ></textarea>
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>

                <a class="btn btn-primary" href="{{ route('testimonial.index') }}" style="margin-left: 130px;"> Back</a>
                <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
              </form>
        </div>
    </div>
</div>


    
@endsection
@section('scripts')
    
@endsection
