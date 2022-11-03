<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Models\Jobcategory;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
       
        $recruiters = Recruiter::all();
        //  return $recruiter; 
        return view('recruiter.index',compact('recruiters'))
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

        return view('recruiter.create',compact('jobcategory'));
       
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
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'website' => 'required',
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

        Recruiter::create($postData);

        if ($request) {
            return redirect()->route('recruiter.index')->with('success','recruiter created successfully');
        }
        else {
            return back()->with('failed', 'Failed! Product not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recruiter = Recruiter::find($id);
        return view('recruiter.show', compact('recruiter'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategory = Jobcategory::all();
        $recruiter = Recruiter::find($id);
        return view('recruiter.edit',compact('recruiter','jobcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'jobcategory_id' => 'required',  
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'website' => 'required',
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
        
        Recruiter::where('id',$id)->update($postData);

        if ($request) {
            return redirect()->route('recruiter.index')->with('success','GST updated successfully');
        }else {
            return back()->with('failed', 'Failed! Recruiter not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recruiter::find($id)->delete();

        return redirect()->route('recruiter.index')->with('success','Recruiter deleted successfully');
    }
}

