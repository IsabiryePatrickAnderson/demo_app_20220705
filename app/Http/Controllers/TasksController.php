<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TasksController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = DB::table('tasks')->where('approved','Y')->get();    
        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('tasks.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    
        DB::table('tasks')->insert([
            'user' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'approved' => 'N',
        ]);

        $resp = 'success';
     
        return redirect()->to('/tasks')->with($resp,'Task added successfully.');
    }

    public function edit($id)
    {
    	$task = DB::table('tasks')->where('id',$id)->first(); 
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    
        DB::table('tasks')->where('id',$id)->update([
            'user' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $resp = 'success';
     
        return redirect()->to('/tasks')->with('success','Task updated successfully.');
    }

    public function delete($id)
    {
        DB::table('tasks')->where('id',$id)->delete();    
        return redirect()->to('/tasks')->with('success','Task deleted successfully');
    }


    public function unapproved()
    {
        $tasks = DB::table('tasks')->where('approved','N')->get();    
        return view('tasks.unapproved',compact('tasks'));
    }

    public function approve($id)
    {    
        DB::table('tasks')->where('id',$id)->update([
            'approved' => 'Y',
        ]);
     
        return redirect()->to('/unapproved-tasks')->with('success','Task approved successfully.');
    }
}
