<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = Tag::simplePaginate(5);
        return view('backend.tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view page for url request of create page of tag
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $input = $request->all();
        
        $input['created_by'] = auth()->user()->id;
        $tag = Tag::create($input);

        if ($tag) {
            $request->session()->flash('success', 'tag creation successful!');
        } else {
            $request->session()->flash('error', 'tag creation failed!');
        }
        return redirect()->route('backend.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the records in tag table with use of id
        $data['record'] = Tag::find($id);
        return view(('backend.tag.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find records as per id form tag table
        $data['record'] = Tag::find($id);
        if (!$data['record']) {
            request()->session()->flash('error', 'Invalid request!!!');
            return redirect()->route('backend.tag.index');
        }
        return view(('backend.tag.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $data['record'] = Tag::find($id);
        if (!$data['record']) {
            request()->session()->flash('error_message', 'Invalid request for details');
            return redirect()->route('backend.tag.index');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;

        
        $record = $data['record']->update($input);
        if ($record) {
            $request->session()->flash('success', 'tag Update Successfully ');
        } else {
            $request->session()->flash('error', 'tag Update Failed');
        }
        return redirect()->route('backend.tag.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$data['record'] = Tag::find($id)){
            $request->session()->flash('error', 'Invalid request!');
        }
        if($data['record']->delete()){
            $request->session()->flash('success', 'tag Delete Success!');
        }else{
            $request->session()->flash('error', 'tag Delete Failed!');
        }
        return redirect()->route('backend.tag.index');
    }
    
    // to view the trashed data 
    public function trash(){
        
        $data['records'] = Tag::onlyTrashed()->get();
        return view(('backend.tag.trash'),compact('data'));
    }

    //to resore the data form trash list
    function restore(Request $request,$id)
    {
        if(!$data['record'] = Tag::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->restore()){
            $request->session()->flash('success', 'tag Restore Successfully');
        } else {
            $request->session()->flash('error', 'tag Restore failed');
        }
        return redirect()->route('backend.tag.index');
    }

    //to permanently delete data from database
    function forceDelete(Request $request,$id)
    {
        if(!$data['record'] = Tag::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->forceDelete()){
            $image_path = 'images/backend/tag/';
            $path =$image_path.$data['record']->image;
            if (file_exists($path) && !empty($data['record']->image)) {
                unlink(public_path($path));
            }
            $request->session()->flash('success', 'tag Deleted Success');
        } else {
            $request->session()->flash('error', 'tag Deletion failed');
        }
        return redirect()->route('backend.tag.trash');
    }
}
