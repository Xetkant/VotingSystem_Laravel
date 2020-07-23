<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidates::all();
        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // Validation // check
        $request->validate([
            // input name
            'name' => 'required|min:5|max:255',
            'photo' => 'required',
            'bio' => 'required'
            
        ]);

        // If file include, upload
        if ($request->hasfile('photo')) {
            $profile = $request->file('photo');
            $filename = time().'.'.$profile->getClientOriginalExtension();
            $profile->move(public_path().'/storage/photo/',$filename);
            $photo = '/storage/photo/'.$filename;
        }

        $candidate = new Candidates;
        $candidate->name = request('name');
        $candidate->photo = $photo;
        $candidate->bio = request('bio');
        $candidate->save();

        // Return
        return redirect()->route('candidates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $candidate = Candidates::find($id);
        return view('candidates.detail', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidates::find($id);  // obj
        return view('candidates.edit', compact('candidate'));
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
        // dd($request);

        // Validation // check
        $request->validate([
            // input name
            'name' => 'required|min:5|max:255',
            'photo' => 'sometimes|mimes:jpeg,bmp,png',
            'bio' => 'required'
        ]);

        // If file include, upload
        if ($request->hasfile('photo')) {
            $profile = $request->file('photo');
            $filename = time().'.'.$profile->getClientOriginalExtension();
            $profile->move(public_path().'/storage/photo/',$filename);
            $photo = '/storage/photo/'.$filename;
        }else{
            $photo = request('oldphoto');
        }
        

        // Update Data // with help of model
        $candidate = Candidates::find($id);
        $candidate->name = request('name');
        $candidate->photo = $photo;
        $candidate->bio = request('bio');
        $candidate->save();

        // Return
        return redirect()->route('candidates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidates::find($id);
        $candidate->delete();
        return redirect()->route('candidates.index');
    }
}
