<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::latest()->paginate(5);
        return view('testimonial.index',compact('testimonial'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonial.create');
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
            'image' => 'required',  
            'name' => 'required',
            'specialist' => 'required',
            'description' => 'required',
        ]);
        $postData = $request->all();

        //Image upload functionality
        if($request->hasFile('image')){
            $uploadedFile = $request->file('image');
            $filename = time().$uploadedFile->getClientOriginalName();
            $request->file('image')->move('files',$filename);
            $postData['image'] = $filename;
        }
        Testimonial::create($postData);


        if ($request) {
            return redirect()->route('testimonial.index')->with('success','testimonial created successfully');
        }
        else {
            return back()->with('failed', 'Failed! GST not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'image' => 'required',  
            'name' => 'required',
            'specialist' => 'required',
            'description' => 'required',
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
        
        Testimonial::where('id',$id)->update($postData);


        if ($request) {
            return redirect()->route('testimonial.index')->with('success','about updated successfully');
        }else {
            return back()->with('failed', 'Failed! about not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::find($id)->delete();

        return redirect()->route('testimonial.index')->with('success','about deleted successfully');
    }
}
