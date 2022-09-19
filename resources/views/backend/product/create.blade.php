@extends('backend.layouts.master')
@section('title','Create Product')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('main-content')
<div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Product Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active">Create</li>
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
                <button class="nav-link active" id="basic-tab" data-toggle="tab" data-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">basic</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="images-tab" data-toggle="tab" data-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">images</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tags-tab" data-toggle="tab" data-target="#tags" type="button" role="tab" aria-controls="tags" aria-selected="false">tags</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="attribute-tab" data-toggle="tab" data-target="#attribute" type="button" role="tab" aria-controls="attribute" aria-selected="false">attribute</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="meta-tab" data-toggle="tab" data-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">meta</button>
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
                  here comes form fields for attribute
                </div>
                <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
                  here comes form fields for meta
                </div>
              </div>
            {!! Form::close() !!}

            
               

          </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- /.content -->
  @section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $("#title").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
      
        $('.multiple_tags').select2({
            theme: 'bootstrap4'
        });
    </script>
    @include('backend.product.includes.add_row_script')

  @endsection
@endsection