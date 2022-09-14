@extends('backend.layouts.master')
@section('title',$title)
@section('panel',$panel)
@section('entryoptionactive','active')
@section('productactive','active')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$title}}</div>

                    <div class="card-body">
                        @include('layouts.flash_message')
                        <a href="javascript:history.back()" class="btn btn-secondary btn-sm"> <i class="fas fa-arrow-left"></i> Go Back</a>
                        {{--<a href="{{route('category.edit',$data['record']->id)}}" class="btn btn-success">Edit</a>--}}
                        <form action="{{route($base_route.'destroy',$data['record']->id)}}" method="post" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form><br><br>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#basic_information_tab" data-toggle="tab">Basic Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#images_tabl" data-toggle="tab">Image</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#attributes_tab" data-toggle="tab">Attribute</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tags_tab" data-toggle="tab">Tags</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#meta_tab" data-toggle="tab">Meta Information</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            {{--@include('backend.includes.flash_message')--}}
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="basic_information_tab">
                                        @include($view_path . 'includes.show_main_form')
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="images_tabl">
                                        @include($view_path . 'includes.show_images_form')
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="attributes_tab">
                                        @include($view_path . 'includes.show_attribute_form')
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tags_tab">
                                        @include($view_path . 'includes.show_tags_form')
                                    </div>
                                {{--Meta form--}}
                                <!-- /.tab-pane -->
                                    <div class="tab-pane" id="meta_tab">
                                        {{--@include($view_path . 'includes.meta_form')--}}
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="form-group">
                                    {{--{!! Form::submit('Save ' .  $panel,['class' => 'btn btn-primary']); !!}--}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection