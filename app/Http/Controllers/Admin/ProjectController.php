<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Auth;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Projects';

        if(Auth::user()->type === 1){
            $data = Project::with(['user'])->orderBy('id', 'DESC')->get();
        }else{
            $data = Project::with(['user'])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }

        return view('admin.activities.list',compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Project';
        return view('admin.activities.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            's_name' => 'required',
            'year' => 'required',
            'department' => 'required',
            'school' => 'required',
            'document' => 'required'
        ]);

        $id = Auth::user()->id;
        $project = new Project();
        $project->name = $request->name;
        $project->s_name = $request->s_name;
        $project->year = $request->year;
        $project->department = $request->department;
        $project->school = $request->school;
        $project->document = '';
        $project->body = $request->body;
        $project->pages = $request->pages;
        $project->chapters = $request->chapters;
        $project->user_id = $id;
        $project->save();

        $file = $request->file('document');
        $file_name = time(). '.' .$file->getClientOriginalExtension();
        $file->move('document/', $file_name);

        $project->document = $file_name;
        $project->save();

        return redirect('/back/project/create')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Project Edit';
        $project = Project::find($id);
        return view('admin.activities.edit', compact('page_name', 'project'));
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
        $this->validate($request, [
            'name' => 'required',
            's_name' => 'required',
            'year' => 'required',
            'department' => 'required',
            'school' => 'required',
            'document' => 'required'
        ]);

        $project = Project::find($id);

        if($request->file('document')){
            // unlink('document/'. $project->document);
            $file = $request->file('document');
            $file_name = time(). '.' .$file->getClientOriginalExtension();
            $file->move('document/', $file_name);

            $project->document = $file_name;
        }
        
        $project->name = $request->name;
        $project->s_name = $request->s_name;
        $project->year = $request->year;
        $project->department = $request->department;
        $project->school = $request->school;
        $project->body = $request->body;
        $project->pages = $request->pages;
        $project->chapters = $request->chapters;
        $project->save();

        return redirect('/back/project/list')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/back/project/list')->with('success', 'Project deleted successfully');
    }

    public function approval_status($id)
    {
        // $id = Auth::user()->id;  
        $user = Project::find($id);
        if($user->approval_status === 0){
            $user->approval_status = 1;
        }else{
            $user->approval_status = 0;
        }

        $user->save();
        return redirect('/back/project/list')->with('success', 'Approval status changed successfully');
    }

    public function approved_project()
    {
        $page_name = 'Approved Projects';

        if(Auth::user()->type === 1){
            $data = Project::with(['user'])->where('approval_status', 1)->orderBy('id', 'DESC')->get();
        }else{
            $data = Project::with(['user'])->where('user_id', Auth::user()->id)->where('approval_status', 1)->orderBy('id', 'DESC')->get();
        }

        return view('admin.activities.approved',compact('page_name', 'data'));
    }
}
