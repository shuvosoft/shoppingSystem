<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('priority','asc')->get();
        return view('admin.pages.division.index',compact('divisions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'please provide a division name',
                'priority.required' =>'please provide a division priority',
            ]);
        $division = new Division();
        $division->name= $request->name;
        $division->priority= $request->priority;
        $division->save();
        session()->flash('success','A new division has added successfully !!');
        return redirect()->route('division.index');
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
        $division= Division::find($id);
        if(!is_null($division))
        {
            return view('admin.pages.division.edit',compact('division'));
        }
        else
        {
            return redirect()->route('division.index');
        }
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
        $this->validate($request,[
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'please provide a division name',
                'priority.required' =>'please provide a division priority',
            ]);
        $division =  Division::find($id);
        $division->name= $request->name;
        $division->priority= $request->priority;
        $division->save();

        session()->flash('success',' division has updated successfully !!');
        return redirect()->route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
