<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Auth;
use DB;

class HomepageController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        if($search){
            $data = Project::where('name', 'LIKE', "%{$search}%")->paginate(2);
             return view('front.list', compact('data'));
        }else{
            $data = Project::all();

            return view('front.index', compact('data'));
        }
        
    }

    public function list()
    {
    	$page_name = 'Projects';

        $search = request()->query('search');

        if($search){
            $data = Project::where('name', 'LIKE', "%{$search}%")->paginate(2);
        }else{
            $data = Project::paginate(2);
        }

    	return view('front.list', compact('page_name', 'data'));
    }
    
    public function show($id)
    {
        $data = Project::find($id);

        return view('front.details', compact('data'));
    }

    public function download($file)
    {

        return response()->download('document/'.$file);
    }
}
