@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Job Post</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('jobpost.store') }}">
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
                        <strong>Descrption</strong>
                        <input type="text" name="description" value="{{old('description') }}"id="descrption" class="form-control" placeholder="descrption" >
                        
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                                  
            

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('jobpost.index') }}" style="margin-left: 130px;"> Back</a>
                    <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
