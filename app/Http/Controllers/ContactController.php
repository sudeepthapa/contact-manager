<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at','desc')->get();   // select * from 'contacts'
        $all = Contact::all()->count();   // select * from 'contacts'
        $active = Contact::where('status',true)->count();   // select * from 'contacts'
        $inactive = Contact::where('status',false)->count();  // select * from 'contacts'

        return view('pages.contacts.list', [
            'all'=>$all,
            'contacts'=>$contacts,
            'active'=>$active,
            'inactive'=>$inactive,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'phone_number'=>'required',
            'email'=>'required | email',
            'address'=>'required',
            'nickname'=>'required',
            'dob'=>'required',
            'avatar'=>'required'
        ]);

        //File Handling

        $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();

        $filePath = $request->file('avatar')->storeAs('avatars', $fileName, 'public');

        $contact = new Contact;

        $contact->dob = new Carbon($request->dob);

        $contact->name = $request->input('name');
        $contact->nickname = $request->nickname;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->status = $request->status;
        $contact->phone_number = $request->phone_number;

        $contact->avatar = 'storage/'.$filePath;

        $contact->save();

        return redirect()->route('contacts.index')
            ->with('success','Contact Added Successfully')
            ->with('error',"Cannot Add Contact")
            ->with('warn',"Warning")
            ->with('info',"Info");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('pages.contacts.show', compact('contact'))->with('info','You are Viewing '.$contact->name."'s ".'contact');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        
        return view('pages.contacts.edit', compact('contact'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required | max:10',
            'status'=>'required',
            'phone_number'=>'required',
            'email'=>'required | email',
            'address'=>'required',
            'nickname'=>'required',
        ]);

        $contact = Contact::find($id);
        
        $contact->name = $request->name;
        $contact->nickname = $request->nickname;
        $contact->email = $request->email;

        if($request->file('avatar')){
            //delete old file
            //upload new file
            $contact->avatar = "filePath";
        }

        $contact->status = $request->status;
        $contact->address = $request->address;
        $contact->phone_number = $request->phone_number;

        $contact->save();

        return redirect()->route('contacts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        
        //Delete Image
        unlink($contact->avatar);

        $contact->delete();
        return redirect()->route('contacts.index');
    }

    public function active()
    {
        $contacts = Contact::where('status',true)->orderBy('created_at','desc')->get();   // select * from 'contacts'
        $all = Contact::all()->count();   // select * from 'contacts'
        $active = Contact::where('status',true)->count();   // select * from 'contacts'
        $inactive = Contact::where('status',false)->count();  // select * from 'contacts'

        return view('pages.contacts.list', [
            'all'=>$all,
            'contacts'=>$contacts,
            'active'=>$active,
            'inactive'=>$inactive,
        ]);
    }

    public function inactive()
    {
        $contacts = Contact::where('status',false)->orderBy('created_at','desc')->get();   // select * from 'contacts'
        $all = Contact::all()->count();   // select * from 'contacts'
        $active = Contact::where('status',true)->count();   // select * from 'contacts'
        $inactive = Contact::where('status',false)->count();  // select * from 'contacts'

        return view('pages.contacts.list', [
            'all'=>$all,
            'contacts'=>$contacts,
            'active'=>$active,
            'inactive'=>$inactive,
        ]);
    }


}
