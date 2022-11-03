<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apply = Apply::latest()->paginate(5);
        return view('apply.index',compact('apply'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apply = Apply::all();
        return view('apply.create');
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
           
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            "file" => "required|mimes:pdf|max:10000"
            
        ]);


        // store pdf (image)code 
        $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('file')){
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('file')->move('files',$filename);
            $postData['file'] = $filename;
        }

        Apply::create($postData);

        if ($request) {
            return redirect()->route('apply.create')->with('success','You Applied Successfully');
        }
        else {
            return back()->with('failed', 'Failed! Product not created');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apply = Apply::find($id);
        return view('apply.show', compact('apply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function edit(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apply $apply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apply $apply)
    {
        //
    }
}
