<?php

namespace App\Http\Controllers;

use App\Models\Contactinfo;
use Illuminate\Http\Request;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactinfo = Contactinfo::latest()->paginate(5);
        return view('contactinfo.index',compact('contactinfo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactinfo.create');
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
            'address' => 'required',
            'email'=>'required',
            'mobileno'=>'required',
            
        ]);

        Contactinfo::create($request->all());

        if ($request) {
            return redirect()->route('contactinfo.index')->with('success','staff created successfully');

        }
        else {
            return back()->with('failed', 'Failed! Doctor not created');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactinfo = Contactinfo::find($id);
        return view('contactinfo.show', compact('contactinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactinfo = Contactinfo::find($id);
        return view('contactinfo.edit', compact('contactinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'address' => 'required',
            'email'=>'required',
            'mobileno'=>'required',
         ]);
         
        $contactinfo = Contactinfo::find($id);
        $contactinfo->update($request->all());

        if ($request) {
            return redirect()->route('contactinfo.index')->with('success','contactinfo updated successfully');

        }
        else {
            return back()->with('failed', 'Failed! contactinfo not update');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contactinfo::find($id)->delete();

        return redirect()->route('contactinfo.index')->with('success','contactinfo deleted successfully');
    }
}
