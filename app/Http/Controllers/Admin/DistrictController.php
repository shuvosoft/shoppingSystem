<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts= District::orderBy('name','asc')->get();
        return view('admin.pages.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
       return view('admin.pages.district.create',compact('divisions'));
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
            'division_id' => 'required',
        ],
            [
                'name.required' => 'please provide a district name',
                'division_id.required' =>'please provide a division for the district',
            ]);
        $district = new District();
        $district->name= $request->name;
        $district->division_id= $request->division_id;
        $district->save();
        session()->flash('success','A new district has added successfully !!');
        return redirect()->route('district.index');
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
        $divisions = Division::all();
        $district = District::find($id);
        return view('admin.pages.district.edit',compact('divisions','district'));

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
            'division_id' => 'required',
        ],
            [
                'name.required' => 'please provide a division name',
                'division_id.required' =>'please provide a division for the district',
            ]);
        $district =  District::find($id);
        $district->name= $request->name;
        $district->division_id= $request->division_id;
        $district->save();

        session()->flash('success',' district has updated successfully !!');
        return redirect()->route('district.index');
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
