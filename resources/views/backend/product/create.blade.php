@extends('backend.layouts.master')
@section('title','Create Product')
@section('css')
  <link href="{{asset('backend/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
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
  
 
    <!-- /.content -->
  @section('js')
    <script src="{{asset('backend/plugins/select2/js/select2.min.js')}}"></script>
    <script>
      $("#title").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
      
        $('.multiple_tags').select2();

        // for images_form cloning
        var row = 1;
        $("#addMoreImage").click(function(e) {
          e.preventDefault();
          var row_limit = 5;
          
          if(row<row_limit){
            row++;
            
            $("#image_wrapper tr:last").after(`<tr>
              <td>
                  <input type="file" name="image_title[]" class="form-control"/></td>
              <td>
                <button id="blank" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>
              </td>
            </tr>`);
          }else{
            alert("You can add only add "+row_limit+" Images");
          }
          
        });
         $("#image_wrapper").on("click", ".remove_row", function (e) {
          e.preventDefault();
          $(this).parents("tr").remove();
          row--;
        });
        
        // clone for image attributes
        var arow = 1;
        $("#addMoreAttribute").click(function(e) {
          e.preventDefault();
          var arow_limit = 5;
          
          if(arow<arow_limit){
            arow++;
            
            $("#attribute_wrapper tr:last").after(
              '<tr>'+
                '   <td>{!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                '   </td>'+
                '   <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                '   <td>'+
                '<button id="blank" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>'+

                '   </td>'+
                '</tr>'
            );
          }else{
            alert("You can add only add "+arow_limit+" Attributes");
          }
          
        });
         $("#attribute_wrapper").on("click", ".remove_row", function (e) {
          e.preventDefault();
          $(this).parents("tr").remove();
          arow--;
        });

        //get subcategory as per category
        $("#category_id").change(function(e){
          e.preventDefault();
          var cat_id = $(this).val();
          if(cat_id != ''){
                $.ajax({
                    url:`{{route('backend.category.subcategory')}}`,
                    data:{'category_id':cat_id},
                    method:'get',
                    dataType:'text',
                    success:function(resp) {
                      $("#subcategory_id").empty();
                      $("#subcategory_id").append(resp);
                    }
                });
            } else {

                $('#subcategory_id').empty();
                $('#subcategory_id').append("<option value=''>Select Subcategory</option>");

            }
          
        })

    </script>

  @endsection
@endsection