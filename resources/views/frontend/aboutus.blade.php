@extends('layouts.frontend')
@section('styles')
  
@endsection

@section('content')


        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="/assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>About us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- Hero Area End -->
            <!-- Support Company Start-->
            <div class="support-company-area fix section-padding2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="right-caption">
                                <!-- Section Tittle -->
                                @foreach ($about as $about)
                                <div class="section-tittle section-tittle2">
                                    <span>What we are doing</span>
                                    <h2>{{ $about->title }}</h2>
                                </div>
                                <div class="support-caption">
                                    <p class="pera-top">{{ $about->description }}</p>
                                    <a href="about.html" class="btn post-btn">Post a job</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="support-location-img">
                                <img src="{{asset('files/'.$about->image)}}" alt="">
                                <div class="support-img-cap text-center">
                                    <p>Since</p>
                                    <span>1994</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Support Company End-->
            <!-- How  Apply Process Start-->
            <div class="apply-process-area apply-bg pt-150 pb-150" data-background="/assets/img/gallery/how-applybg.png">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle white-text text-center">
                                <span>Apply process</span>
                                <h2> How it works</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Apply Process Caption -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-search"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>1. Search a job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-curriculum-vitae"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>2. Apply for job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-tour"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>3. Get your job</h5>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- How  Apply Process End-->
            <!-- Testimonial Start -->
            
            <!-- Testimonial End -->
            <!-- Online CV Area Start -->
            
            <!-- Online CV Area End-->
        
            <!-- Blog Area Start -->
          
            <!-- Blog Area End -->



@endsection
@section('scripts')
    
@endsection