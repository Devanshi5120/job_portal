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
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Show  JobSeeker</h1>

                <div class="mb-3">
                  <strong> JobCategory Name : </strong>
                  {{   $jobseeker->jobcategory->name }}
                </div>

                <div class="mb-3">
                  <strong>Name : </strong>
                  {{  $jobseeker->name }}
                </div>

                <div class="mb-3">
                  <strong>Gender : </strong>
                  {{ $jobseeker->gender }}
                </div>

                <div class="mb-3">
                  <strong>Contact : </strong>
                  {{  $jobseeker->contact }}
                </div>

                <div class="mb-3">
                  <strong> Email: </strong>
                  {{ $jobseeker->email  }}
                </div>

                {{-- <div class="mb-3">
                  <strong> Image : </strong>
                 {{ $jobseeker->image}}
                </div> --}}

                <div class="mb-3">
                    <strong> Education : </strong>
                    {{ $jobseeker->education }}
                  </div>

                  <div class="mb-3">
                    <strong> Status: </strong>
                    {{  $jobseeker->status }}
                  </div>
  

                <a class="btn btn-primary" href="{{ route('jobseeker.index') }}"> Back</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    
@endsection