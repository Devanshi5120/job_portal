@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')

<h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Job </h1>

<div class="card">
    <div class="card-body">
        {!! Form::model($job, ['method' => 'PUT', 'enctype'=>"multipart/form-data",'route' => ['job.update', $job->id]]) !!}
                @csrf

                <div class="row">
        
               <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select JobCategory</strong>
                                    <select class="form-control" name="jobcategory_id" id="jobcategory_id" >
                                        @foreach ($jobcategory as $item)
                                            <option @if($job->jobcategory_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
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
                                            <option @if($job->recruiter_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                
                                        @error('recruiter_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                      </div>


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong> Title</strong>
                        {!! Form::text('title', null, ['placeholder' => 'Edit name ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
    
                
                    
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Descrption</strong>
                        {!! Form::text('description', null, ['placeholder' => 'Edit contact ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                    
                             
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Type</strong>
                        <select class="form-control" id="type" name="type">
                            <option value="">Select type</option>
                            <option {{ $job->type == 'Part-Time' ? 'selected':'' }}>Part-Time</option>
                            <option {{ $job->type == 'Full-Time' ? 'selected':'' }}>Full-Time</option>
                       
                          </select>
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>
                    
                     
                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Vacancy</strong>
                        {!! Form::text('vacancy', null, ['placeholder' => 'Edit vacancy ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('vacancy')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>

                      <div class="col-12 col-md-6 col-lg-4">
                        <strong> Qualification</strong>
                        {!! Form::text('qualification', null, ['placeholder' => 'Edit qualification ', 'class' => 'form-control', 'maxlength' => '25']) !!}
                        @error('qualification')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div><br>

                      <div class="col-12 col-md-6 col-lg-4">
                        <strong>Designation</strong>
                        {!! Form::text('designation', null, ['placeholder' => 'Edit designation ', 'class' => 'form-control']) !!}
                        @error('designation')
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
                      <div class="col-12 col-md-6 col-lg-6">
                        <strong>Skill </strong>
                        {!! Form::textarea('skill', null, ['placeholder' => 'Edit designation ', 'class' => 'form-control']) !!}
                        {{-- <textarea name="skill"></textarea> --}}
                        {{-- <input type="text" name="skill1" value="{{ old('skill1') }}"id="skill1" class="form-control"
                            placeholder="skill1"> --}}

                        @error('skill')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <strong>Experience </strong>
                        {{-- <textarea name="experience"></textarea> --}}
                        {!! Form::textarea('experience', null, ['placeholder' => 'Edit designation ', 'class' => 'form-control']) !!}
                        {{-- <input type="text" name="skill1" value="{{ old('skill1') }}"id="skill1" class="form-control"
                            placeholder="skill1"> --}}

                        @error('experience')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                <div class="col-12 ">
                    <a class="btn btn-primary" href="{{ route('job.index') }}" style="margin-left: 130px;"> Back</a>
                    <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                </div>
            </form>

        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection
@section('scripts')
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ]
  });
</script>
@endsection
