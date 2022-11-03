@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Recruiter</h1>

<div class="card">
    <div class="card-body">
        {!! Form::model($recruiter, ['method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['recruiter.update', $recruiter->id]]) !!}
                @csrf

                <div class="row">
        
                 
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>JobCategory</strong>
                        <select class="form-control" name="jobcategory_id" id="jobcategory_id">
                          @foreach ($jobcategory as $key => $item)
                              <option @if($recruiter->jobcategory_id == $item->id) selected @endif  value="{{ $item->id  }}" {{ old('jobcategory_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                         @endforeach
                         @error('hospital_id')
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
                        <strong> Address</strong>
                        {!! Form::text('address', null, ['placeholder' => 'Edit address ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> City</strong>
                        {!! Form::text('city', null, ['placeholder' => 'Edit city ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    
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
                        <strong> Web-Site</strong>
                        {!! Form::text('website', null, ['placeholder' => 'Edit website ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                    
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Image</strong>
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br><br>
                      </div>
                    
            

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('recruiter.index') }}" style="margin-left: 130px;"> Back</a>
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
