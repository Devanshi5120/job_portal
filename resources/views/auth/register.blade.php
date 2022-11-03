@extends('layouts.guest')
@section('styles')
    
@endsection
@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        {{-- @if ($errors->any())
                            <div>
                                <div class="font-medium text-red-600">
                                    {{ __('Whoops! Something went wrong.') }}
                                </div>

                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="First Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                        id="exampleInputpassword_confirmation" placeholder="Password Confirmation">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            
                            </div>
                            <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Register</button>
                            
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}"
                            {{ __('Forgot your password?') }}>Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
            
@endsection





