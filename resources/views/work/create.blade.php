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

            <form method="POST" action="{{ route('work.store') }}"enctype="multipart/form-data">
                @csrf
            

                <div class="mb-3">
                    <strong>Title </strong>
                    <input type="text" name="title" class="form-control" placeholder="title ">
                  @error('title1')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>

                
             <div class="mb-3">
                  <strong>Description </strong>
                  <textarea  name="description" class="form-control" placeholder="Description1" ></textarea>
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>

                

                <a class="btn btn-primary" href="{{ route('work.index') }}" style="margin-left: 130px;"> Back</a>
                <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
              </form>
        </div>
    </div>
</div>


    
@endsection
@section('scripts')
    
@endsection
