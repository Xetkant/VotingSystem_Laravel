<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\packages;
use App\User;
use App\Vote;
use Auth;
use DB;

class PageController extends Controller
{
    public function index()
    {
        $candidates =Candidates::all(); 
        return view('idols.index',compact('candidates')); 
    }
    public function about()
    {
        return view('idols.about');
    }
    public function packages($cid)
    {
        $packages =packages::all(); 
        return view('idols.package',compact('packages','cid')); 
    }
    public function help()
    {
        return view('idols.help');
    }
    public function voters()
    {
        // $voters= User::all();
        $voters =User::with('roles')->where('id','!=','1')->get();
        
        return view('users.index', compact('voters'));
    }
    public function store(Request $request)
    {
        
        $user_id=Auth::id();
        $vote = new Vote();
        $vote->user_id=$user_id;
        $vote->candidate_id=request('candidate_id');
        $vote->package_id=request('package_id');
        $vote->point=request('point');
        $vote->save();

        // Return
        return redirect()->route('index');
    }

    public function votelist()
    {
        $votes =DB::table('votes')
                ->join('users','users.id','=','votes.user_id')
                ->join('candidates','candidates.id','=','votes.candidate_id')
                ->join('packages','packages.id','=','votes.package_id')
                ->select('votes.*','users.*','users.name as user_name','candidates.*','candidates.name as candidate_name','packages.*','packages.name as package_name')
                ->get();
        return view('vote',compact('votes'));
    }

}