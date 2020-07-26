<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('created_by', '=', auth()->user()->name)->get();
        return response()->view('manager.index',
            compact('tasks')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'task_name' => 'required|max:255',
            'assigned_to' => 'required',
            'status ' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('manager')
                ->withErrors($validator)
                ->withInput();
        }*/
        $tasks = new Task();
        $tasks->task_name = $request->task_name;
        $tasks->created_by = $request->created_by;
        $tasks->assigned_to = $request->assigned_to;
        $tasks->status = $request->status;
        $tasks->description = $request->description;
        $tasks->user_id = Auth()->id();
        $tasks->save();
        return  redirect('manager')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::find($id);
        return response()->view('manager.show',
            compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::find($id);

        return response()->view('manager.edit',
            ['tasks' => $tasks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $tasks = new Task;
        Task::where('id', $id)->update([
            'task_name' => $request->task_name,
            'created_by' => $request->created_by,
            'assigned_to' => $request->assigned_to,
            'status' =>  $request->status,
            'description' => $request->description,
            'user_id' => Auth()->id()
        ]);
        return  redirect('manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return  redirect('manager');
    }

    public function search(Request $request){

        $search = $request->get( 'search');
        $tasks = Task::where('task_name','LIKE','%'.$search.'%');


        return view('manager.index', compact('tasks'));
    }
}
