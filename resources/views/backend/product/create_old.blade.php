@extends('backend.layouts.master')
@section('title','Create Product')
@section('main-content')
    <!-- Default box -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#basic_information_tab" data-toggle="tab">Basic Information</a></li>
                <li class="nav-item"><a class="nav-link" href="#images_tabl" data-toggle="tab">Image</a></li>
                <li class="nav-item"><a class="nav-link" href="#attributes_tab" data-toggle="tab">Attribute</a></li>
                <li class="nav-item"><a class="nav-link" href="#tags_tab" data-toggle="tab">Tags</a></li>
                <li class="nav-item"><a class="nav-link" href="#meta_tab" data-toggle="tab">Meta Information</a></li>
            </ul>
        </div><!-- /.card-header -->
        {{--@include('backend.includes.flash_message')--}}
        {!! Form::open(['route' => $base_route . 'store','files' => true]) !!}
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="basic_information_tab">
                    @include($view_path . 'includes.main_form',['button' => 'Save'])
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="images_tabl">
                    @include($view_path . 'includes.images_form')
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="attributes_tab">
                    @include($view_path . 'includes.attribute_form')
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tags_tab">
                    @include($view_path . 'includes.tags_form')
                </div>
            {{--Meta form--}}
            <!-- /.tab-pane -->
                <div class="tab-pane" id="meta_tab">
                    @include($view_path . 'includes.meta_form')
                </div>
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
        <div class="card-footer">
            <div class="form-group">
                {!! Form::submit('Save ' .  $panel,['class' => 'btn btn-primary']); !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.card -->
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
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
        $('#category_id').change(function(){
            var category_id = $(this).val();
            if(category_id != ''){
                $.ajax({
                    url:'ajax/category/getSubcategory',
                    data:{'category_id':category_id},
                    method:'get',
                    dataType:'text',
                    success:function(resp) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append(resp);
                    }
                });
            } else {

                $('#subcategory_id').empty();
                $('#subcategory_id').append("<option value=''>Select Subcategory</option>");

            }

        });
    </script>
    @include($view_path . 'includes.add_row_script')
    @include($view_path . 'includes.add_row_script_attribute')
    @endsection

