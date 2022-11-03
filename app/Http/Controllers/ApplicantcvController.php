<?php

namespace App\Http\Controllers;
use File;
use App\Models\applicantcv;
use App\Models\Jobcategory;
use App\Models\Recruiter;
use App\Models\Jobseeker;
use Illuminate\Http\Request;

class ApplicantcvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantcv = applicantcv::all();
        //  return $recruiter; 
        return view('applicantcv.index',compact('applicantcv'))
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
        $jobseeker = Jobseeker::all();

        return view('applicantcv.create',compact('jobcategory','recruiter','jobseeker'));
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
            'jobseeker_id' => 'required',
            "file" => "required|mimes:pdf|max:10000"
            
        ]);

    
// store pdf (image)
        $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('file')){
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('file')->move('files',$filename);
            $postData['file'] = $filename;
        }

        applicantcv::create($postData);

        if ($request) {
            return redirect()->route('applicantcv.index')->with('success','recruiter created successfully');
        }
        else {
            return back()->with('failed', 'Failed! Product not created');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\applicantcv  $applicantcv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicantcv = applicantcv::find($id);
        return view('applicantcv.show', compact('applicantcv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\applicantcv  $applicantcv
     * @return \Illuminate\Http\Response
     */
    public function edit(applicantcv $applicantcv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\applicantcv  $applicantcv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, applicantcv $applicantcv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\applicantcv  $applicantcv
     * @return \Illuminate\Http\Response
     */
    public function destroy(applicantcv $applicantcv)
    {
        //
    }
}
