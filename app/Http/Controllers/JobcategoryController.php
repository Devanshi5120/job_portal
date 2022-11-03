<?php

namespace App\Http\Controllers;

use App\Models\Jobcategory;
use Illuminate\Http\Request;

class JobcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcategory = Jobcategory::latest()->paginate();
        return view('jobcategory.index',compact('jobcategory'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobcategory.create');
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
            'name' => 'required',
            
        ]);

        Jobcategory::create($request->all());

        if ($request) {
            return redirect()->route('jobcategory.index')->with('success','jobcategory created successfully');

        }
        else {
            return back()->with('failed', 'Failed! jobcategory not created');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobcategory = Jobcategory::find($id);
        return view('jobcategory.show', compact('jobcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobcategory = Jobcategory::find($id);
        return view('jobcategory.edit', compact('jobcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'name' => 'required',
          

        ]);
        $jobcategory = Jobcategory::find($id);
        $jobcategory->update($request->all());

        if ($request) {
            return redirect()->route('jobcategory.index')->with('success','jobcategory updated successfully');

        }
        else {
            return back()->with('failed', 'Failed! jobcategory not update');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobcategory  $jobcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobcategory::find($id)->delete();

        return redirect()->route('jobcategory.index')->with('success','jobcategory deleted successfully');
    }
}
