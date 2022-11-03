@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <h1 class="h3 mt-2 text-gray-800" style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">
        Job </h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('job.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select JobCategory</strong>
                        <select class="form-control" name="jobcategory_id" id="jobcategory_id">
                            @foreach ($jobcategory as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                            @error('jobcategory_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Select Recruiter</strong>
                        <select class="form-control" name="recruiter_id" id="recruiter_id">
                            @foreach ($recruiter as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                            @error('recruiter_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Title</strong>
                        <input type="text" name="title" value="{{ old('title') }}"id="title" class="form-control"
                            placeholder="descrption">

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Descrption</strong>
                        <input type="text" name="description" value="{{ old('description') }}"id="description"
                            class="form-control" placeholder="descrption">

                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Type</strong>
                        <select class="form-control" name="type" id="type">
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Vacancy</strong>
                        <input type="text" name="vacancy" value="{{ old('vacancy') }}"id="vacancy"
                            class="form-control" placeholder="vacancy">

                        @error('vacancy')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Qualification</strong>
                        <input type="text" name="qualification" value="{{ old('qualification') }}"id="qualification"
                            class="form-control" placeholder="descrption">

                        @error('qualification')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Designation</strong>
                        <input type="text" name="designation" value="{{ old('designation') }}"id="designation"
                            class="form-control" placeholder="designation">

                        @error('designation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <strong>Skill </strong>
                        <textarea name="skill"></textarea>
                        {{-- <input type="text" name="skill1" value="{{ old('skill1') }}"id="skill1" class="form-control"
                            placeholder="skill1"> --}}

                        @error('skill')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <strong>Experience </strong>
                        <textarea name="experience"></textarea>
                        {{-- <input type="text" name="skill1" value="{{ old('skill1') }}"id="skill1" class="form-control"
                            placeholder="skill1"> --}}

                        @error('experience')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6 col-lg-4">
                        <strong>Image</strong>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>

                    <div class="col-12 ">
                        <a class="btn btn-primary" href="{{ route('job.index') }}" style="margin-left: 130px;"> Back</a>
                        <button type="submit" class="btn btn-success" style="background: green;">Submit</button>
                    </div>
            </form>

        </div>
    </div>
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
