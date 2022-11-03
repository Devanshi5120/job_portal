<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobcategory;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        
        //  return $recruiter; 
        return view('job.index',compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobcategory = Jobcategory::all();
        $recruiter = Recruiter::all();

        return view('job.create',compact('jobcategory','recruiter'));
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
            'jobcategory_id' => 'required',  
            'recruiter_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'vacancy' => 'required',
            'qualification' => 'required',
            'designation' => 'required',
            'skill' => 'required',
            'experience' => 'required',
            'image' => 'required',
        ]);

       
        $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('image')){
            $uploadedFile = $request->file('image');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('image')->move('files',$filename);
            $postData['image'] = $filename;
        }

        Job::create($postData);

        if ($request) {
            return redirect()->route('job.index')->with('success','recruiter created successfully');
        }
        else {
            return back()->with('failed', 'Failed! Product not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategory = Jobcategory::all();
        $recruiter = Recruiter::all();
        $job = Job::find($id);
        return view('job.edit',compact('job','jobcategory','recruiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'jobcategory_id' => 'required',  
            'recruiter_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'vacancy' => 'required',
            'qualification' => 'required',
            'designation' => 'required',
            'skill' => 'required',
           'experience' => 'required',
            'image' => 'required',
        ]);
        $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('image')){
            $uploadedFile = $request->file('image');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('image')->move('files',$filename);
            $postData['image'] = $filename;
        }

        // Product::update($postData);

        unset($postData['_method']);
        unset($postData['_token']);
        
        Job::where('id',$id)->update($postData);


        // $recruiter = Recruiter::find($id);
        // $recruiter->update($request->all());


      

        if ($request) {
            return redirect()->route('job.index')->with('success','job updated successfully');

        }
        else {
            return back()->with('failed', 'Failed! jobcategory not update');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
