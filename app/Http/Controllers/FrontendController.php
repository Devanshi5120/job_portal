<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use App\Models\Aboutus;
use App\Models\Recruiter;
use App\Models\Jobcategory;
use App\Models\Job;
use App\Models\Work;
use App\Models\Testimonial;
use App\Models\Contactinfo;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        $jobcategory = Jobcategory::all();

//count each category of job..
        $jobcategory->map(function($data){
            $data->count = Job::where('jobcategory_id',$data->id)->count();
        });
        
        $work = Work::all();
    
        return view('frontend.index',compact('testimonial','jobcategory','work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
       
        $about = Aboutus::all();
        // return $about;
        return view('frontend.aboutus',compact('about'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'message' => 'required',
            'name' => 'required',
            'email'=>'required',
            'subject'=>'required',
            
        ]);

        Contact::create($request->all());

        if ($request) {
            return redirect()->route('contact.index')->with('success','staff created successfully');

        }
        else {
            return back()->with('failed', 'Failed! Doctor not created');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }

    
    public function contactus()
    {
        $contactinfo = Contactinfo::all();
        return view('frontend.contact',compact('contactinfo'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function jobDetails($id)
    {
        $job =Job::find($id);
        $recruiter =Recruiter::all();

       return view('frontend.job_details',compact('job','recruiter'));
      
    }
    
    public function job_listing(Request $request,$id=null)//passed null for no data and find job listing....
    {

        $jobs = new Job();

        // search for jobcategory in listing page

        if(!empty($request->jobcategory_id)){
            $jobs =  $jobs->where('jobcategory_id',$request->jobcategory_id);
        }
//jobcategory passed in job listng

        if($id){
            $jobs =  $jobs->where('jobcategory_id',$id);
            $request->jobcategory_id = $id;
        }


        $jobcategory = Jobcategory::all();
        $jobs = $jobs->get();
        // return $jobs;
        
     return view('frontend.job_listing',compact('jobs','jobcategory','request'));
    }

   
}
