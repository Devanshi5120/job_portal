@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">About</h1>

<div class="card">
    <div class="card-body">
        {!! Form::model($baner, ['method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['baner.update', $baner->id]]) !!}
                @csrf

                <div class="row">
        
                
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Title</strong>
                        {!! Form::text('title', null, ['placeholder' => 'Edit name ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('title')
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
                    
                 <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('baner.index') }}" style="margin-left: 130px;"> Back</a>
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
