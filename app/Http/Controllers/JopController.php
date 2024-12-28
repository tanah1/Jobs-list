<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJopsRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use App\Models\Jop;


class JopController extends Controller
{
    function index()
    {
        $jobs = Jop::select('*')->orderBy('id', 'ASC')->paginate(10);
        return view('jobs', ['jobs' => $jobs]);
    }

    function create()
    {
        return view('create');
    }

    function store(CreateJopsRequest $request)
    {
        $datatoinsert['name'] = $request->job_name;
        $datatoinsert['active']= $request->job_active;

        Jop::create($datatoinsert);

        return redirect()->route('index')->with('success', 'Added Successfully');

    }

    function show()
    {

    }

    function edit($id)
    {
        $data = Jop::select("*")->find($id);
        return view('edit', ['data' => $data]);

    }

    function update($id ,UpdateJobRequest $request)
    {

        $dataToUpdate['name'] = $request->job_name;
        $dataToUpdate['active'] = $request->job_active;

        Jop::where(['id'=>$id])->update($dataToUpdate);

        return redirect()->route('index')->with(['success' => 'Updated successfully']);

    }

    function destroy($id)
    {
        Jop::where(['id' => $id])->delete();
        return redirect()->route('index')->with(['success' => 'Job deleted successfully']);

    }

    



}