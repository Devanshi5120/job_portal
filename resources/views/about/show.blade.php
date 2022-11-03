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
        <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Show  About</h1>


                <div class="mb-3">
                    <strong> Title : </strong>
                    {{ $about->title }}
                  </div>

                  <div class="mb-3">
                    <strong> Description : </strong>
                    {{  $about->description }}
                  </div>

                <a class="btn btn-primary" href="{{ route('about.index') }}"> Back</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    
@endsection