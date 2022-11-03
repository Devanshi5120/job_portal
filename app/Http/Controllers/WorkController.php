<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $work = Work::latest()->paginate(5);
        return view('work.index',compact('work'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
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
    
            'title' => 'required',
            'description' => 'required',
      
        ]);
        Work::create($request->all());

        if ($request) {
            return redirect()->route('work.create')->with('success','Meassage Send successfully');

        }
        else {
            return back()->with('failed', 'Failed! Doctor not created');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
        return view('work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
        
            'title' => 'required',
            'description' => 'required',
          ]);
          
        $work = Work::find($id);
        $work->update($request->all());

        if ($request) {
            return redirect()->route('work.index')->with('success','work updated successfully');

        }
        else {
            return back()->with('failed', 'Failed! jobcategory not update');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Work::find($id)->delete();

        return redirect()->route('work.index')->with('success','Work deleted successfully');
    }
}
