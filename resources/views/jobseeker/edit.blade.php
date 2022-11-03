@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Job Seeker</h1>

<div class="card">
    <div class="card-body">
        {!! Form::model($jobseeker, ['method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['jobseeker.update', $jobseeker->id]]) !!}
                @csrf

                <div class="row">
        
               <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select JobCategory</strong>
                                    <select class="form-control" name="jobcategory_id" id="jobcategory_id" >
                                        @foreach ($jobcategory as $item)
                                            <option @if($jobseeker->jobcategory_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                
                                        @error('jobcategory_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                      </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Name</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Edit name ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Gender</strong>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        
                          </select>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                
                    
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Contact</strong>
                        {!! Form::text('contact', null, ['placeholder' => 'Edit contact ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('contact')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                    
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Email</strong>
                        {!! Form::text('email', null, ['placeholder' => 'Edit email ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
           
                    
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Image</strong>
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br><br>
                      </div>
                    
                     
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Education</strong>
                        {!! Form::text('education', null, ['placeholder' => 'Edit website ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('education')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                               
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Work Status</strong>
                        <select class="form-control" id="status" name="status">
                            <option value="">Select status</option>
                            <option value="part-timr">Part-Time</option>
                            <option value="full-time">Full-Time</option>
                            <option value="Internship">Internship</option>
                          </select>
                        @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('jobseeker.index') }}" style="margin-left: 130px;"> Back</a>
                    <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                </div>
            </form>

        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection
@section('scripts')

@endsection
