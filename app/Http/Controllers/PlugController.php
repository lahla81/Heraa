<?php

namespace App\Http\Controllers;

use App\Plug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PlugController extends Controller
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
        //$plugs=DB::table('plugs')->latest()->get();
        $plugs= Plug::latest()->get();
        $archives = $this->getArchives();
        return view('plug.index',['image'=>Auth::user()->image], compact('plugs','archives','image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$archives = $this->getArchives();
        $method = 'post';
        $action = route('plugs.store');
        return view('plug.create',['image'=>Auth::user()->image], compact('method','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if(Auth::user())
        {
            $path = Storage::putFile('image', $request['image']);

            Plug::create([
                'title'    =>$request->title,
                'slug'     =>$request->slug,
                'head'     =>$request->head,
                'subtitle' =>$request->subtitle,
                'body'     =>$request->body,
                'image'    => $path,
                'user_id'  =>$request->user_id,
            ]);
            return redirect('/plugs');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plug  $plug
     * @return \Illuminate\Http\Response
     */
    public function show(Plug $plug)
    {
        //$plugs = DB::table('plugs')->find($plug);

        $archives = $this->getArchives();
        return view('plug.show',['image'=>Auth::user()->image],compact('archives','plug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plug  $plug
     * @return \Illuminate\Http\Response
     */
    public function edit(Plug $plug)
    {
        $plugs = Plug::find($plug);
        $archives = $this->getArchives();
        $method = 'put';
        $action = route('plugs.update',['id'=>$plug]);
        return view('plug.create',['image'=>Auth::user()->image], compact('plugs','archives','plug','action','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plug  $plug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plug $plug)
    {
        // Plug::find($plug)->update($request->all());
        // return redirect('plug.index');

        $this->editValidator($request->all())->validate();        
        $path = Storage::putFile('image', $request['image']);
        $plug->update([
            'title'    =>$request->title,
            'slug'     =>$request->slug,
            'head'     =>$request->head,
            'subtitle' =>$request->subtitle,
            'body'     =>$request->body,
            'image'    => $path,
            'user_id'  =>$request->user_id,
        ]);
        {
            return $this->show($plug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plug  $plug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plug $plug)
    {
        if($plug->delete())
        {
            return back();
        }
    }

    private function validator(array $request)
    {
        return Validator::make($request,[
            'title'      => 'required',
            'slug'       => 'required|alpha_dash|unique:plugs',
            'head'       => 'required',
            'subtitle'   => 'required',
            'body'       => 'required',
            'image'      => 'required|image'
        ],[
            'title.required' => 'الرجاء ادخال نص عنوان المقالة',
            'title.max' => 'عدد الأحرف لا يزيد عن 150 حرف',
            'slug.unique' => 'لابد أن يكون الإسم اللطيف وحيد',
            'subtitle.required' => 'الرجاء إدخال العنوان الفرعي',
            'head.required' => 'رأس المقالة مطلوب',
            'body.required' => 'نص المقالة مطلوب'
        ]);

    }

    private function editValidator(array $request)
    {
        return Validator::make($request,[
            'title'      => 'required|max:100',
            'slug'       => 'required',Rule::unique('slug')->ignore(Auth::id()),
            'head'       => 'required',
            'subtitle'   => 'required',
            'body'       => 'required',
            'image'      => 'required|image'
        ],[
            'title.required' => 'الرجاء ادخال نص عنوان المقالة',
            'title.max' => 'عدد الأحرف لا يزيد عن 150 حرف',
            'subtitle.required' => 'الرجاء إدخال العنوان الفرعي',
            'head.required' => 'رأس المقالة مطلوب',
            'body.required' => 'نص المقالة مطلوب'
        ]);
    }

    private function getArchives()
    {
        
        return \App\Plug::selectRaw('MONTHNAME(created_at) month, MONTH(created_at) month_number, YEAR(created_at) year, COUNT(*) plugs_count')->groupBy('month','month_number','year')->orderBy('created_at')->get();
    }

    public function archive($year, $month)
    {
        $plugs=Plug::whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        $archives = $this->getArchives();
        return view('plug.index',compact('plugs', 'archives'),['image'=>Auth::user()->image]);
    }
}
