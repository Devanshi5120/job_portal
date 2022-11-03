<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;

class BanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baner = Baner::latest()->paginate(5);
        return view('baner.index',compact('baner'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baner.create');
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
        Baner::create($postData);


        if ($request) {
            return redirect()->route('baner.index')->with('success','Faq created successfully');
        }
        else {
            return back()->with('failed', 'Failed! GST not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baner = Baner::find($id);
        return view('baner.show', compact('baner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $baner = Baner::find($id);
        return view('baner.edit', compact('baner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([ 
            'title' => 'required',
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
        
        Baner::where('id',$id)->update($postData);


        // $recruiter = Recruiter::find($id);
        // $recruiter->update($request->all());

        if ($request) {
            return redirect()->route('baner.index')->with('success','Baner updated successfully');
        }else {
            return back()->with('failed', 'Failed! Baner not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Baner::find($id)->delete();

        return redirect()->route('baner.index')->with('success','Baner deleted successfully');
    }
}
