<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contactinfo;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contact = Contact::latest()->paginate(5);
        // return view('contact.index',compact('contact'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactinfo = Contactinfo::all();
        return view('contact.create',compact('contactinfo'));
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
            'message' => 'required',
            'name' => 'required',
            'email'=>'required',
            'subject'=>'required',
            
        ]);

        Contact::create($request->all());

        $data = [
            'message'=>$request->message,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
          
        ];
       
        //mail send formate.
        Mail::send('invoice', $data, function($message){
          $message->to('devanshi.binstellar@gmail.com', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('no-reply@gmail.com','Devanshi Shukla');
         });

        if ($request) {
            // return redirect()->route('contact.create')->with('success','Contact created successfully');
            return redirect()->route('contact.create')->with('success','Basic Email Sent. Check your inbox.');

        }
        else {
            return back()->with('failed', 'Failed! Contact not created');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
