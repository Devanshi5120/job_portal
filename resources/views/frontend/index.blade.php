@extends('layouts.frontend')
@section('styles')
  
@endsection

@section('content')

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="/assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find the most exciting startup jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach ($jobcategory as $jobcategory)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                       
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                      
                        <div class="services-cap">
                           <h5><a href="{{ route('frontend.job_listingData', $jobcategory->id) }}">{{$jobcategory->name}}</a></h5>
                            <span>({{$jobcategory->count}})</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- More Btn --> 
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Online CV Area Start -->
     <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="/assets/img/gallery/cv_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera1">FEATURED TOURS Packages</p>
                        <p class="pera2"> Make a Difference with Your Online Resume!</p>
                        <a href="{{ route('apply.create') }}" class="border-btn2 border-btn4">Upload your cv</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
   
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
                @foreach ($work as $work)
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                         <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                       <div class="process-cap">
                           <h5> {{ $work->title }}</h5>
                           <p>{{ $work->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- How  Apply Process End-->

           <!-- Testimonial Start -->
          <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            <!-- Single Testimonial -->
                            @foreach ($testimonial as $testimonial)
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="{{asset('files/'.$testimonial->image)}}" alt="">
                                            <span>{{ $testimonial->name }}</span>
                                            <p>{{ $testimonial->specialist }}</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“{{ $testimonial->description }}”</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Testimonial End -->
 
   


@endsection
@section('scripts')
    
@endsection