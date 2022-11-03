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
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Show  Apply</h1>

                <div class="mb-3">
                  <strong> First Name: </strong>
                  {{  $apply->fname	 }}
                </div>

                <div class="mb-3">
                    <strong>Last Name: </strong>
                    {{  $apply->lname }}
                  </div>

                
                  <div class="mb-3">
                    <strong>Gender: </strong>
                    {{  $apply->gender }}
                  </div>

                  <div class="mb-3">
                    <strong>Contact : </strong>
                    {{  $apply->contact }}
                  </div>

                  <div class="mb-3">
                    <strong>Email : </strong>
                    {{  $apply->email }}
                  </div>

                <a class="btn btn-primary" href="{{ route('apply.index') }}"> Back</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    
@endsection