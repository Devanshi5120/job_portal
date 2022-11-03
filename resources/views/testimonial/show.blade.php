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
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Show  Testimonial</h1>


                <div class="mb-3">
                    <strong> Name : </strong>
                    {{ $testimonial->name }}
                  </div>

                  <div class="mb-3">
                    <strong> Specialist : </strong>
                    {{ $testimonial->specialist }}
                  </div>

                  <div class="mb-3">
                    <strong> Description : </strong>
                    {{  $testimonial->description }}
                  </div>

                <a class="btn btn-primary" href="{{ route('testimonial.index') }}"> Back</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    
@endsection