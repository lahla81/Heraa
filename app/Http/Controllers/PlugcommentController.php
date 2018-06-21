<?php

namespace App\Http\Controllers;

use App\Plugcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PlugcommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->plugCommentValidator($request->all())->validate();
        if(Auth::user())
        {
            Plugcomment::create([
                'comment'        =>$request->comment,
                'user_id'        =>$request->user_id,
                'plug_id'        =>$request->plug_id, 
            ]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plugcomment  $plugcomment
     * @return \Illuminate\Http\Response
     */
    public function show(Plugcomment $plugcomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plugcomment  $plugcomment
     * @return \Illuminate\Http\Response
     */
    public function edit(Plugcomment $plugcomment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plugcomment  $plugcomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plugcomment $plugcomment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plugcomment  $plugcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plugcomment $plugcomment)
    {
        
        if($plugcomment->delete())
        {
            return back();
        }
    }

    private function plugCommentValidator(array $request)
    {
        return Validator::make($request,[
            'comment'      => 'required|max:150',
            
        ],[
            'comment.required' => 'الرجاء ادخال نص  تعليق',
        ]);
    }
}
