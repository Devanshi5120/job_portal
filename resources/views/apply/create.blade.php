@extends('layouts.frontend')
@section('styles')
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failed') }}
            <!-- here to 'withWarning()' -->
        </div>
    @endif

    <div class="card-body">

        <div class="row">

            <div class="col-4">
            </div>
            

            <div class="col-4" style="background-color: #fff; padding: 50px 50px 50px 50px; margin-top: 50px;">
                <h1 class="h3 mt-2 text-gray-800"
                    style="margin-bottom: 40px; font-size:40px; font-weight:bold; text-align: center;">Apply Now</h1>

                <form method="POST" action="{{ route('apply.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <strong> First Name</strong>
                        <input type="text" name="fname"value="{{ old('fname') }}" id="fname" min="0"
                            class="form-control" placeholder="name">
                        @error('fname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>

                    <div class="mb-3">
                        <strong> Last Name</strong>
                        <input type="text" name="lname"value="{{ old('lname') }}" id="lname" min="0"
                            class="form-control" placeholder="name">
                        @error('lname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <strong> Gender</strong>
                     <select class="form-select" aria-label="Gender">
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    
                    </div>
                        <br>
                        <br>
                    
                    <div class="mb-3">
                        <strong>Contact</strong>
                        <input type="text" name="contact" value="{{ old('contact') }}"id="contact" class="form-control"
                            placeholder="contact">
                         @error('contact')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <strong>Email</strong>
                        <label for="email" class="form-label"></label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>

                    <div class="mb-3">
                        <strong>Resume</strong>
                        <label for="formFileMultiple" class="form-label"></label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                      </div>

                    <div class="col-12 ">

                        <button type="submit" class="btn btn-success" style="background: green ,margin-left: 130px;">Apply 
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
