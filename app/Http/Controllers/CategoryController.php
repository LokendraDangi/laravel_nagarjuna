<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // send the all category data with pagination
        $data['records'] = Category::simplePaginate(5);
        //return the url request to index.blade inside views/backend/category 
        // along with data retrieved form database table
        return view('backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view page for url request of create page of category
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        //check if image is in request array or not
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
            $input['image'] =$image_name;
        }
        //add logged in user id  
        $input['created_by'] = auth()->user()->id;
        //store data in category table using Category Model
        $cat = Category::create($input);

        if ($cat) {
            $request->session()->flash('success', 'Category creation successful!');
        } else {
            $request->session()->flash('error', 'Category creation failed!');
        }
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the records in category table with use of id
        $data['record'] = Category::find($id);
        return view(('backend.category.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find records as per id form Category table
        $data['categories'] = Category::findOrFail($id);
        if (!$data['record']) {
            request()->session()->flash('error', 'Invalid request!!!');
            return redirect()->route('backend.category.index');
        }
        return view(('backend.category.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //check if records for id is available or not 
        $data['record'] = Category::find($id);
        if (!$data['record']) {
            request()->session()->flash('error_message', 'Invalid request for details');
            return redirect()->route('backend.category.index');
        }
        $input = $request->all();
        //add logged in user id in request array
        $input['updated_by'] = auth()->user()->id;

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
            //removing old file
            if (!empty($data['record']->image)) {
                if (file_exists(public_path($image_path . $data['record']->image))) {
                    unlink(public_path($image_path . $data['record']->image));
                }
            }
        }
        $record = $data['record']->update($input);
        if ($record) {
            $request->session()->flash('success', 'Category Update Successfully ');
        } else {
            $request->session()->flash('error', 'Category Update Failed');
        }
        return redirect()->route('backend.category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$data['record'] = Category::find($id)){
            $request->session()->flash('error', 'Invalid request!');
        }
        if($data['record']->delete()){
            $request->session()->flash('success', 'Category Delete Success!');
        }else{
            $request->session()->flash('error', 'Category Delete Failed!');
        }
        return redirect()->route('backend.category.index');
    }
    
    // to view the trashed data 
    public function trash(){
        
        $data['records'] = Category::onlyTrashed()->get();
        return view(('backend.category.trash'),compact('data'));
    }

    //to resore the data form trash list
    function restore(Request $request,$id)
    {
        if(!$data['record'] = Category::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->restore()){
            $request->session()->flash('success', 'Category Restore Successfully');
        } else {
            $request->session()->flash('error', 'Category Restore failed');
        }
        return redirect()->route('backend.category.index');
    }

    //to permanently delete data from database
    function forceDelete(Request $request,$id)
    {
        if(!$data['record'] = Category::onlyTrashed()->where('id',$id)->first()){
            $request->session()->flash('error', 'Invalid request!!!');
        }
        if ($data['record']->forceDelete()){
            $image_path = 'images/backend/category/';
            $path =$image_path.$data['record']->image;
            if (file_exists($path) && !empty($data['record']->image)) {
                unlink(public_path($path));
            }
            $request->session()->flash('success', 'Category Deleted Success');
        } else {
            $request->session()->flash('error', 'Category Deletion failed');
        }
        return redirect()->route('backend.category.trash');
    }

    function getSubcategory(){
        $category_id = $_GET['category_id'];
        
        
        $subcategory =Subcategory::where('category_id',$category_id)->get(['name','id']);

        $option = "<option value=''>Select Subcategory</option>";
        foreach($subcategory as $sub){
            
            $option.= "<option value='$sub->id'>$sub->name</option>";
        }
        return $option;
    }
}
