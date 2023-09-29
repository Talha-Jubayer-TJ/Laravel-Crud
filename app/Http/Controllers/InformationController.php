<?php

namespace App\Http\Controllers;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::orderBy('id','desc')->paginate(5);
        return view('Information.index', compact('informations'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('Information.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request )
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Number' => 'required',
            'Address' => 'required',
        ]);
        
        Information::create($request->post());

        return redirect()->route('Information.index')->with('Success','Information has been created successfully.');
    }

  
    public function show(Information $information)
    {
        return view('Information.show',compact('information'));
    }


    public function edit(Information $information)
    {
        return view('Information.edit',compact('information'));
    }

   
    // public function update(Request $request, Information $information)
    // {
    //     $request->validate([
    //         'Name' => 'required',
    //         'Email' => 'required',
    //         'Number' => 'required',
    //         'Address' => 'required',
    //     ]);
        
    //     $information -> fill($request->post())->save();

    //     return redirect()->route('Information.index')->with('Success','Information Has Been updated successfully');
    // }

    public function update(Request $request, Information $information)
{
    $request->validate([
        'Name' => 'required',
        'Email' => 'required',
        'Number' => 'required',
        'Address' => 'required',
    ]);

    // Update the model fields and save to the database

    $information->update([
        'Name' => $request->input('Name'),
        'Email' => $request->input('Email'),
        'Number' => $request->input('Number'),
        'Address' => $request->input('Address'),
        // Add other fields here if necessary

    ]);

    return redirect()->route('Information.index')->with('success', 'Information has been updated successfully');
}


    // public function edit(Information $information)
    // {
   
    //     return view('Information.edit', ['information' => $information]);
    // }

    // public function update(Information $information, Request $request)
    // {
    //     dd($request);
      
    //     $incomingFields = $request->validate([
    //         'Name' => ['required'],
    //         'Email' => ['required'],
    //         'Number' => ['required'],
    //         'Address' => ['required'],
    //     ]);
        
        
        // $information->update($incomingFields);
        // return redirect('/Information');
    //}


    
    public function destroy(Information $information)
    {

        $information-> delete();
        return redirect()->route('Information.index')->with('Success','Information has been deleted successfully');
    }

    // public function deletePost(Information $information)
    // {
       
    //         $information->delete();
        
    //     return redirect('Information');
    // }
}
