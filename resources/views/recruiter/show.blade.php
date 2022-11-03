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
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Show  Recruiter</h1>

                <div class="mb-3">
                  <strong> JobCategory Name : </strong>
                  {{  $recruiter->jobcategory_id }}
                </div>

                <div class="mb-3">
                  <strong>Name : </strong>
                  {{ $recruiter->name }}
                </div>

                <div class="mb-3">
                  <strong>Address : </strong>
                  {{ $recruiter->address }}
                </div>

                <div class="mb-3">
                  <strong>City : </strong>
                  {{ $recruiter->city }}
                </div>

                <div class="mb-3">
                  <strong> Contact: </strong>
                  {{ $recruiter->contact }}
                </div>

                <div class="mb-3">
                  <strong> Email : </strong>
                  {{ $recruiter->email }}
                </div>

                <div class="mb-3">
                  <strong> Web-Site : </strong>
                  {{ $recruiter->website }}
                </div>

                <div class="mb-3">
                  <strong> Image : </strong>
                 {{ $recruiter->image}}
                </div>

                <a class="btn btn-primary" href="{{ route('recruiter.index') }}"> Back</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    
@endsection