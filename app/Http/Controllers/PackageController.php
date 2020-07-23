<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\packages;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = packages::all();
        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
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
            'amount' => 'required',
            'point' => 'required'
            
        ]);

        // If file include, upload
        if ($request->hasfile('photo')) {
            $profile = $request->file('photo');
            $filename = time().'.'.$profile->getClientOriginalExtension();
            $profile->move(public_path().'/storage/photo/',$filename);
            $photo = '/storage/photo/'.$filename;
        }

        $package = new packages;
        $package->name = request('name');
        $package->photo = $photo;
        $package->amount = request('amount');
        $package->point = request('point');
        $package->save();

        // Return
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages = packages::find($id);
        return view('packages.detail', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = packages::find($id);  // obj
        return view('packages.edit', compact('packages'));
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
            'amount' => 'required',
            'point' => 'required'
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
        $package = packages::find($id);
        $package->name = request('name');
        $package->photo = $photo;
        $package->amount = request('amount');
        $package->point = request('point');
        $package->save();

        // Return
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = packages::find($id);
        $package->delete();
        return redirect()->route('packages.index');
    }
}
