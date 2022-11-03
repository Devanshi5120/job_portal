@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Job Seeker</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('jobseeker.store') }}" enctype="multipart/form-data">
            @csrf

                <div class="row">
        
                 
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select JobCategory</strong>
                                    <select class="form-control" name="jobcategory_id" id="jobcategory_id" >
                                        @foreach ($jobcategory as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                
                                        @error('jobcategory_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                      </div>
              
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong>Name</strong>
                               <input type="text" name="name"value="{{old('name') }}" id="name" min="0" class="form-control" placeholder="name" >
                     @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br>
                </div>

              
                <div class="col-12 col-md-6 col-lg-4">
                    <strong>Gender</strong>
                    <select class="form-control" name="gender" id="gender" >
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                    @error('gender')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br>
                    </div>

                 
                                             
                    
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Contact</strong>
                        <input type="text" name="contact" value="{{old('contact') }}"id="contact" class="form-control" placeholder="contact" >
                        
                        @error('contact')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                 
                        <div class="col-12 col-md-6 col-lg-4">
                            <strong>Email</strong>
                            <input type="text" name="email" value="{{old('email') }}"id="email" class="form-control" placeholder="Email" >
                            
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <strong>Image</strong>
                                <input type="file" name="image" class="form-control" >
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror<br>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <strong>Education</strong>
                                    <input type="text" name="education" value="{{old('education') }}"id="education" class="form-control" placeholder="Email" >
                                    
                                    @error('education')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <strong>Status</strong>
                                        <select class="form-control" name="status" id="status" >
                                            <option value="fresher">Fresher</option>
                                            <option value="experience">Experience</option>
                                        </select>
                                        @error('status')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror<br>
                                        </div>

                                  
            

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('jobseeker.index') }}" style="margin-left: 130px;"> Back</a>
                    <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
