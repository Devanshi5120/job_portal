<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Aboutus::latest()->paginate(5);
        return view('about.index',compact('about'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
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
            'title' => 'required',
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
        Aboutus::create($postData);


        if ($request) {
            return redirect()->route('about.index')->with('success','Faq created successfully');
        }
        else {
            return back()->with('failed', 'Failed! GST not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = Aboutus::find($id);
        return view('about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $about = Aboutus::find($id);
        return view('about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'image' => 'required',  
            'title' => 'required',
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
        
        Aboutus::where('id',$id)->update($postData);


        // $recruiter = Recruiter::find($id);
        // $recruiter->update($request->all());

        if ($request) {
            return redirect()->route('about.index')->with('success','about updated successfully');
        }else {
            return back()->with('failed', 'Failed! about not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aboutus::find($id)->delete();

        return redirect()->route('about.index')->with('success','about deleted successfully');
    }
}
