@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Applicant Cv</h1>

<div class="card">
    <div class="card-body">
            <form method="POST" action="{{ route('applicantcv.store') }}" enctype="multipart/form-data">
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
                        <strong>Select Recruiter</strong>
                                    <select class="form-control" name="recruiter_id" id="recruiter_id" >
                                        @foreach ($recruiter as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                
                                        @error('recruiter_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select JobSeeker</strong>
                                    <select class="form-control" name="jobseeker_id" id="jobseeker_id" >
                                        @foreach ($jobseeker as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                
                                        @error('recruiter_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                      </div>


            <div class="col-12 col-md-6 col-lg-4">
                <strong>CV</strong>
                <input type="file" name="file" accept="application/pdf" /> 
              @error('file')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror<br>
        </div>
            

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('applicantcv.index') }}" style="margin-left: 130px;"> Back</a>
                    <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
