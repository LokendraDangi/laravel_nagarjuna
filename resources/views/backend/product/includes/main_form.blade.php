{!! Form::hidden('page',$button)!!}

<div class="form-group">
    {!! Form::label('category_id','Category*') !!}
    {!! Form::select('category_id',$data['categories'],null,['class' => 'form-control','placeholder' => "Select Category"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'category_id'])
</div>
<div class="form-group">
    {!! Form::label('subcategory_id','Subcategory*') !!}
    {!! Form::select('subcategory_id',$data['subcategories'],null,['class' => 'form-control','placeholder' => "Select Subcategory"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'subcategory_id'])
</div>
<div class="form-group">
    {!! Form::label('title','Title*') !!}
    {!! Form::text('title',null,['class' => 'form-control','placeholder' => "Enter Title"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'title'])
</div>
<div class="form-group">
    {!! Form::label('slug','Slug*') !!}
    {!! Form::text('slug',null,['class' => 'form-control','placeholder' => "Enter Slug"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'slug'])
</div>
<div class="form-group">
    {!! Form::label('price','Price*') !!}
    {!! Form::number('price',null,['class' => 'form-control','placeholder' => "Enter Price"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'price'])
</div>
<div class="form-group">
    {!! Form::label('discount','Discount*') !!}
    {!! Form::number('discount',null,['class' => 'form-control','placeholder' => "Enter Discount"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'discount'])
</div>
<div class="form-group">
    {!! Form::label('quantity','Quantity*') !!}
    {!! Form::number('quantity',null,['class' => 'form-control','placeholder' => "Enter Quantity"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'quantity'])
</div>
<div class="form-group">
    {!! Form::label('unit_id','Unit*') !!}
    {!! Form::select('unit_id',$data['units'],null,['class' => 'form-control','placeholder' => "Select Unit"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'unit_id'])
</div>

<div class="form-group">
    {!! Form::label('specification','Specification*') !!}
    {!! Form::text('specification',null,['class' => 'form-control','placeholder' => "Enter Specification"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'specification'])
</div>
<div class="form-group">
    {!! Form::label('description','Description*') !!}
    {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => "Enter Description"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'description'])
</div>
<div class="form-group">
    {!! Form::label('short_description','Short Description*') !!}
    {!! Form::text('short_description',null,['class' => 'form-control','placeholder' => "Enter Short Description"]) !!}
    @include('backend.includes.form_validation_error_message',['field'=>'short_description'])
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