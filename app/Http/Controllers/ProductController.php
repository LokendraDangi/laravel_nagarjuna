<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use App\Models\ProductImage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = Product::simplePaginate(5);
        return view('backend.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['count_attribute']=1;
        $data['count_image']=1;
        $data['categories'] = Category::where('status',1)->pluck('name','id');
        $data['subcategories'] = [];
        $data['attributes'] = Attribute::where('status',1)->pluck('name','id');
        $data['tags'] = Tag::pluck('name','id');
        return view('backend.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        $request->request->add(['stock' =>$request->input('quantity')]);
        $record = Product::create($request->all());

        if ($record) {
            $record->tags()->attach($request->input('tag_id'));
         
            //insert additional attribute data into product_attributes
            $attribute_data['product_id'] = $record->id;
            $attribute_data['status'] = 1;

            $attibute_ids = $request->input('attribute_id');
            $attibute_values = $request->input('attribute_value');
            for ($i = 0; $i < count($attibute_ids); $i++) {
                if (!empty($attibute_ids[$i]) && !empty($attibute_values[$i])) {
                    $attribute_data['attribute_id'] = $attibute_ids[$i];
                    $attribute_data['attribute_value'] = $attibute_values[$i];
                    ProductAttribute::create($attribute_data);
                }
            }
            //upload multiple image
            $product_image = $request->file('image_title');
            $image_data['product_id'] = $record->id;
            $image_data['status'] = $request->input('image_status');
            $image_path = 'images/backend/product/';
            for ($i = 0; $i < count($product_image); $i++) {
                if (!empty($product_image[$i])) {
                    //upload image
                    $image_file = $product_image[$i];
                    $image_name = uniqid() . '_' . $image_file->getClientOriginalName();
                    $image_file->move(public_path($image_path), $image_name);
                    
                    $image_data['image_title'] = $image_name;
                    ProductImage::create($image_data);
                }
            }
            $request->session()->flash('success','product created successfully!');
        } else {
            $request->session()->flash('error','Product creation failed!');
        }
        return redirect()->route('backend.product.index');
      
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
        //
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
        //
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
