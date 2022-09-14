<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = Attribute::simplePaginate(5);
        return view('backend.attribute.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:10|min:5'
        ]);

        $input = $request->all();
        
        $input['created_by'] = auth()->user()->id;
        $attribute = Attribute::create($input);

        if ($attribute) {
            $request->session()->flash('success', 'attribute creation successful!');
        } else {
            $request->session()->flash('error', 'attribute creation failed!');
        }
        return redirect()->route('backend.attribute.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the records in Attribute table with use of id
        $data['record'] = Attribute::find($id);
        return view(('backend.attribute.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find records as per id form attribute table
        $data['record'] = Attribute::find($id);
        if (!$data['record']) {
            request()->session()->flash('error', 'Invalid request!!!');
            return redirect()->route('backend.attribute.index');
        }
        return view(('backend.attribute.edit'), compact('data'));
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
        $data['record'] = Attribute::find($id);
        if (!$data['record']) {
            request()->session()->flash('error_message', 'Invalid request for details');
            return redirect()->route('backend.attribute.index');
        }
        $request->validate([
            'name'=>'required|max:10|min:5'
        ]);
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;

        
        $record = $data['record']->update($input);
        if ($record) {
            $request->session()->flash('success', 'attribute Update Successfully ');
        } else {
            $request->session()->flash('error', 'attribute Update Failed');
        }
        return redirect()->route('backend.attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$data['record'] = Attribute::find($id)){
            $request->session()->flash('error', 'Invalid request!');
        }
        if($data['record']->delete()){
            $request->session()->flash('success', 'attribute Delete Success!');
        }else{
            $request->session()->flash('error', 'attribute Delete Failed!');
        }
        return redirect()->route('backend.attribute.index');
    }
    
    // to view the trashed data 
    public function trash(){
        
        $data['records'] = Attribute::onlyTrashed()->get();
        return view(('backend.attribute.trash'),compact('data'));
    }

    //to resore the data form trash list
    function restore(Request $request,$id)
    {
        if(!$data['record'] = Attribute::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->restore()){
            $request->session()->flash('success', 'attribute Restore Successfully');
        } else {
            $request->session()->flash('error', 'attribute Restore failed');
        }
        return redirect()->route('backend.attribute.index');
    }

    //to permanently delete data from database
    function forceDelete(Request $request,$id)
    {
        if(!$data['record'] = Attribute::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->forceDelete()){
            
            $request->session()->flash('success', 'attribute Deleted Success');
        } else {
            $request->session()->flash('error', 'attribute Deletion failed');
        }
        return redirect()->route('backend.attribute.trash');
    }
}
