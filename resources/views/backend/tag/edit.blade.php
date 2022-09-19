@extends('backend.layouts.master')
@section('title','Edit tag')
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
            
            {!! Form::model($data['record'], ['route' => ['backend.tag.update',$data['record']->id],'files' => true,'method' => 'PUT']) !!}  
                @include('backend.tag.includes.main_form',['button'=>'Update tag'])
            {!! Form::close() !!}
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @section('js')
    <script>
            $("#name").keyup(function(){
              var name_value = $('#name').val();
                name_value = name_value.toLowerCase();
                name_value = name_value.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(name_value);
    
            });
        </script>
    @endsection
@endsection