<?php

namespace App\Http\Controllers;

use App\Models\Jobseeker;
use App\Models\Jobcategory;
use Illuminate\Http\Request;

class JobseekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobseekers = Jobseeker::all();
        //  return $recruiter; 
        return view('jobseeker.index',compact('jobseekers'))
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
        return view('jobseeker.create',compact('jobcategory'));
       
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
            'name' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'image' => 'required',
            'education' => 'required',
            'status' => 'required',
            
        ]);
            $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('image')){
            $uploadedFile = $request->file('image');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('image')->move('files',$filename);
            $postData['image'] = $filename;
        }

        Jobseeker::create($postData);

        if ($request) {
            return redirect()->route('jobseeker.index')->with('success','recruiter created successfully');
        }
        else {
            return back()->with('failed', 'Failed! Product not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobseeker = Jobseeker::find($id);
        return view('jobseeker.show', compact('jobseeker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategory = Jobcategory::all();
        $jobseeker = Jobseeker::find($id);
        return view('jobseeker.edit',compact('jobseeker','jobcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'jobcategory_id' => 'required',  
            'name' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'image' => 'required',
            'education' => 'required',
            'status' => 'required',
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
        
        Jobseeker::where('id',$id)->update($postData);

        if ($request) {
            return redirect()->route('jobseeker.index')->with('success','GST updated successfully');
        }else {
            return back()->with('failed', 'Failed! GST not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobseeker::find($id)->delete();

        return redirect()->route('jobseeker.index')->with('success','hospital deleted successfully');
    }
}
