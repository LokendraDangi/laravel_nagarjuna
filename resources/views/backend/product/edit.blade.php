@extends('backend.layouts.master')
@section('title','Edit Product')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Product Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('backend.product.index')}}">Product</a></li>
                  <li class="breadcrumb-item active">Edit</li>
              </ol>
          </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
     <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="basic-tab" data-toggle="tab" data-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">Basic Information</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="images-tab" data-toggle="tab" data-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">Images</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tags-tab" data-toggle="tab" data-target="#tags" type="button" role="tab" aria-controls="tags" aria-selected="false">Tags</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="attribute-tab" data-toggle="tab" data-target="#attribute" type="button" role="tab" aria-controls="attribute" aria-selected="false">Attribute</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="meta-tab" data-toggle="tab" data-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta Properties</button>
              </li>
            </ul>
            {!! Form::open(['route' => 'backend.product.store','files' => true]) !!}
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                  @include('backend.product.includes.main_form',['button'=>'Save Product'])
                </div>
                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                  @include('backend.product.includes.images_form',['button'=>'Save Product'])
                </div>
                <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                  @include('backend.product.includes.tags_form',['button'=>'Save Product'])
                </div>
                <div class="tab-pane fade" id="attribute" role="tabpanel" aria-labelledby="attribute-tab">
                  @include('backend.product.includes.attribute_form',['button'=>'Save Product'])
                </div>
                <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
                  @include('backend.product.includes.meta_form',['button'=>'Save Product'])
                </div>
              </div>
            {!! Form::close() !!}

            
               

          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection



