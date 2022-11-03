<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Models\Jobcategory;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobposts = Jobpost::all();
        
        //  return $recruiter; 
        return view('jobpost.index',compact('jobposts'))
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

        return view('jobpost.create',compact('jobcategory','recruiter'));
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
            'description' => 'required',
       
        ]);

        Jobpost::create($request->all());

        if ($request) {
            return redirect()->route('jobpost.index')->with('success','Jobpost created successfully');
        }
        else {
            return back()->with('failed', 'Failed! Job not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobpost = Jobpost::find($id);
        return view('jobpost.show', compact('jobpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategory = Jobcategory::all();
        $recruiter = Recruiter::all();
        $jobpost = Jobpost::find($id);
        return view('jobpost.edit',compact('jobpost','jobcategory','recruiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        request()->validate([
            'jobcategory_id' => 'required',  
            'recruiter_id' => 'required',
            'description' => 'required',

        ]);
        $jobpost = Jobpost::find($id);
        $jobpost->update($request->all());

        if ($request) {
            return redirect()->route('jobpost.index')->with('success','jobcategory updated successfully');

        }
        else {
            return back()->with('failed', 'Failed! jobcategory not update');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobpost::find($id)->delete();

        return redirect()->route('jobpost.index')->with('success','hospital deleted successfully');
    }
}
