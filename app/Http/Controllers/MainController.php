<?php

namespace App\Http\Controllers;

use App\Project;
use App\Plug;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $projects=DB::table('projects')->latest()->get();
        $plugs=DB::table('plugs')->latest()->get();
        $teams=DB::table('teams')->latest()->get();
        return view('index',['image'=>Auth::user()->image], compact('projects','plugs','teams'));
    }

    public function contact() 
    {
        
        return view('contact',['image'=>Auth::user()->image]);
    }
}
