<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\SubcategoryRequest;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = Subcategory::simplePaginate(5);
        return view('backend.subcategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['categories'] = Category::pluck('name', 'id');
        
        return view('backend.subcategory.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        //check if file is present in form data
        if ($request->hasFile('image_file')) {
            //set path for image storage
            $image_path = 'images/backend/subcategory/';
            //stores files name in variable
            $image_file = $request->file('image_file');
            //get original image name
            $image_name = uniqid() . '_' . $image_file->getClientOriginalName();
            //store image to assigned path
            $image_file->move(public_path($image_path),$image_name);
            //add image name to database field
            $request->request->add(['image' => $image_name]);
        }
        $slug = Str::slug($request->name, '-');
        $request->request->add(['slug' => $slug]);
        $request->request->add(['created_by' => auth()->user()->id]);
        $subcat = Subcategory::create($request->all());

        if ($subcat) {
            $request->session()->flash('success', 'Subcategory creation successful!');
        } else {
            $request->session()->flash('error', 'Subcategory creation failed!');
        }
        return redirect()->route('backend.subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the records in subcategory table with use of id
        $data['subcategory'] = Subcategory::with('category')->findOrFail($id);

        return view(('backend.subcategory.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::pluck('name', 'id');

        $data['subcategory'] = Subcategory::find($id);
        return view('backend.subcategory.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $data['record'] = Subcategory::find($id);
        if (!$data['record']) {
            request()->session()->flash('error_message', 'Invalid request for details');
            return redirect()->route('backend.subcategory.index');
        }
        $input = $request->all();
        $input['updated_by'] = auth()->user()->id;
        // check for subcategory name update 
        if($data['record']->name != $request->name){
            $slug = Str::slug($request->title, '-');
            $input['slug'] = $slug;
        }
         //check is request form form has image or not
         if ($request->hasFile('image')) {
            //assign path for image storage inside public folder
            $image_path = 'images/backend/category/';
            //store image form request in image_file variable
            $image_file = $request->file('image');
            //assign name to image
            $image_name = uniqid() . '_' . $image_file->getClientOriginalName();
            //move image to assigned path
            $image_file->move(public_path($image_path),$image_name);
           //add image_name to request array 
            $input['image'] = $image_name;
            //removing old image
            if (!empty($data['record']->image)) {
                if (file_exists(public_path($image_path . $data['record']->image))) {
                    unlink(public_path($image_path . $data['record']->image));
                }
            }
        }
        $record = $data['record']->update($input);
        if ($record) {
            $request->session()->flash('success', 'SubCategory Update Successfully ');
        } else {
            $request->session()->flash('error', 'SubCategory Update Failed');
        }
        return redirect()->route('backend.subcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$data['record'] = Subcategory::find($id)){
            $request->session()->flash('error', 'Invalid request!');
        }
        if($data['record']->delete()){
            $request->session()->flash('success', 'SubCategory Deletetion Success!');
        }else{
            $request->session()->flash('error', 'SubCategory Deletetion Failed!');
        }
        return redirect()->route('backend.subcategory.index');
    }
    
    // to view the trashed data 
    public function trash(){
        
        $data['records'] = Subcategory::onlyTrashed()->get();
        return view(('backend.subcategory.trash'),compact('data'));
    }

    //to resore the data form trash list
    function restore(Request $request,$id)
    {
        if(!$data['record'] = Subcategory::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->restore()){
            $request->session()->flash('success', 'SubCategory Restored Successfully');
        } else {
            $request->session()->flash('error', 'SubCategory Restoration failed');
        }
        return redirect()->route('backend.subcategory.index');
    }

    //to permanently delete data from database
    function forceDelete(Request $request,$id)
    {
        if(!$data['record'] = Subcategory::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->forceDelete()){
            $image_path = 'images/backend/subcategory/';
            $path =$image_path.$data['record']->image;
            if (file_exists($path) && !empty($data['record']->image)) {
                unlink(public_path($path));
            }
            $request->session()->flash('success', 'Subcategory Deleted Success');
        } else {
            $request->session()->flash('error', 'Subcategory Deletion failed');
        }
        return redirect()->route('backend.subcategory.trash');
    }
}
