@extends('backend.layouts.master')
@section('title','Create tag')
@section('main-content')
<div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">tag Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.tag.index')}}">tag</a></li>
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

          {!! Form::open(['route' => 'backend.tag.store','files' => true]) !!}
                @include('backend.tag.includes.main_form',['button'=>'Save tag'])
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