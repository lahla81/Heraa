<?php

namespace App\Http\Controllers;

use App\Project;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProjectController extends Controller
{
    function __construct()
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
        //$projects=DB::table('projects')->latest()->get();
        $projects= Project::latest()->get();
        $archives = $this->getArchives();
        return view('project.index',['image'=>Auth::user()->image], compact('projects','image','archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $action = route('projects.store');
        return view('project.create',['image'=>Auth::user()->image],compact('action', 'method'));
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
            Project::create([
                'title'        =>$request->title,
                'excerpt'      =>$request->excerpt,
                'category'     =>$request->category,
                'description'  =>$request->description,
                'image'        => $path,
                'user_id'      =>$request->user_id,
            ]);
            return redirect('/projects');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $archives = $this->getArchives();
        //$projects = DB::table('projects')->find($project);
        return view('project.show',['image'=>Auth::user()->image],compact('project','archives'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $method = 'put';
        $action = route('projects.update',['id'=>$project]);
        return view('project.create',['image'=>Auth::user()->image],compact('project','action', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        // $this->validator($request->all())->validate();
        // if($project->fill($request->all())->save())
        // {
        //     return $this->show($project);
        // }

        $this->validator($request->all())->validate();        
        $path = Storage::putFile('image', $request['image']);
        $project->update([
            'title'        =>$request->title,
            'excerpt'      =>$request->excerpt,
            'category'     =>$request->category,
            'description'  =>$request->description,
            'image'        => $path,
            'user_id'      =>$request->user_id,
        ]);
        {
            return $this->show($project);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->delete())
        {
            return back();
        }
    }

    private function validator(array $request)
    {
        return Validator::make($request,[
            'title'      => 'required|max:100',
            'category'   => 'required|alpha_dash',
            'description'=> 'required',
            'excerpt'    => 'required',
            'image'      => 'required|image'
        ],[
            'title.required' => 'الرجاء ادخال نص عنوان المشروع',
            'title.max' => 'عدد الأحرف لا يزيد عن 100 حرف',
            'category.required' => 'الرجاء إدخال التصنيف ',
            'description.required' => 'وصف المشروع مطلوب',
            'excerpt.required' => 'المقتطف مطلوب',
            'image.required' => 'مطلوب تحميل صورة',
            'image.image' => 'نوع الملف لابد أن يكون صورة'
        ]);
    }

    private function getArchives()
    {
        
        return Project::selectRaw('MONTHNAME(created_at) month, MONTH(created_at) month_number, YEAR(created_at) year, COUNT(*) projects_count')->groupBy('month','month_number','year')->orderBy('created_at')->get();
    }

    public function archive($year, $month)
    {
        $projects=Project::whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        $archives = $this->getArchives();
        return view('project.index',compact('projects', 'archives'),['image'=>Auth::user()->image]);
    }

}
