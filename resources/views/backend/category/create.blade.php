@extends('backend.layouts.master')
@section('title','Create Category')
@section('main-content')
<div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Category Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Category</a></li>
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

          {!! Form::open(['route' => 'backend.category.store','files' => true]) !!}
                @include('backend.category.includes.main_form',['button'=>'Save Category'])
            {!! Form::close() !!}

          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @section('js')
    <script>
            $("#name").keyup(function(){
              var d = $('#name').val();
                d = d.toLowerCase();
                d = d.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(d);
    
            });
        </script>
    @endsection
@endsection