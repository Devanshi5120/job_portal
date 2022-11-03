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
                        <h2>JOB DETAILS</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{asset('files/'.$job->image)}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $job->jobcategory->name}}</h4>
                                </a>
                                <ul>
                                    <li>{{ $job->recruiter->name  }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->title }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->
                   
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{ $job->description}}</p>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <!---show html form value in filed(binding)--->
                           {!! $job->skill !!}
                    
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                        {!! $job->experience !!}
                        </div>
                    </div>
                </div>
         
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Job Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span>{{ $job->created_at}}</span></li>
                          <li>Location : <span>New York</span></li>
                          <li>Vacancy : <span>{{ $job->vacancy}}</span></li>
                          <li>Job nature : <span>{{ $job->type}}</span></li>
                          <li>Salary :  <span>$7,800 yearly</span></li>
                          <li> <span></span></li>
                      </ul>
                     <div class="apply-btn2">
                        <a href="{{ route('apply.create') }}" class="btn">Apply Now</a>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

@endsection
@section('scripts')
    
@endsection