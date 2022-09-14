@extends('backend.layouts.master')
@section('title','Edit Attribute')
@section('main-content')
<div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Attribute Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.attribute.index')}}">Attribute</a></li>
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
            
            {!! Form::model($data['record'], ['route' => ['backend.attribute.update',$data['record']->id],'files' => true,'method' => 'PUT']) !!}  
                @include('backend.attribute.includes.main_form',['button'=>'Update Category'])
            {!! Form::close() !!}
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   @endsection