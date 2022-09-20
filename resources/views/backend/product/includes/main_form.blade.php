<div class="form-group">
{!! Form::label('category_id','Category*') !!}
    {!! Form::select('category_id',$data['categories'],null,['class' => 'form-control','placeholder' => "Select Category"]) !!}
    @error('category_id')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
{!! Form::label('subcategory_id','Subcategory*') !!}
    {!! Form::select('subcategory_id',$data['subcategories'],null,['class' => 'form-control','placeholder' => "Select Subcategory"]) !!}
    @error('subcategory_id')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
{!! Form::label('title','Title*') !!}
    {!! Form::text('title',null,['class' => 'form-control','placeholder' => "Enter Title"]) !!}
    @error('title')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug','Slug') !!}
    {!! Form::text('slug',null,['class' => 'form-control','placeholder' => "Enter Slug"]) !!}
    @error('slug')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('price','Price*') !!}
    {!! Form::number('price',null,['class' => 'form-control','placeholder' => "Enter Price"]) !!}
    @error('price')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('discount','Discount*') !!}
    {!! Form::number('discount',null,['class' => 'form-control','placeholder' => "Enter Discount"]) !!}
    @error('discount')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('quantity','Quantity*') !!}
    {!! Form::number('quantity',null,['class' => 'form-control','placeholder' => "Enter Quantity"]) !!}
    @error('quantity')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('specification','Specification*') !!}
    {!! Form::text('specification',null,['class' => 'form-control','placeholder' => "Enter Specification"]) !!}
    @error('specification')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('short_description','Short Description*') !!}
    {!! Form::text('short_description',null,['class' => 'form-control','placeholder' => "Enter Short Description"]) !!}
    @error('short_description')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description','Description*') !!}
    {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => "Enter Description"]) !!}
    @error('description')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status',1,['id'=>'basic_status_active']) !!} Active
    {!! Form::radio('status',0,true,['id'=>'basic_status_deactive']) !!} De Active
</div>
<div class="form-group">
    {!! Form::label('flash_product','Flash Product') !!}
    {!! Form::radio('flash_product',1,['id'=>'flash_active']) !!} Active
    {!! Form::radio('flash_product',0,true,['id'=>'flash_deactive']) !!} De Active
</div>
<div class="form-group">
    {!! Form::label('feature_product','Featured Product') !!}
    {!! Form::radio('feature_product',1,['id'=>'feature_active']) !!} Active
    {!! Form::radio('feature_product',0,true,['id'=>'feature_deactive']) !!} De Active
</div>
