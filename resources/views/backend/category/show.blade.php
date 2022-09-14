@extends('backend.layouts.master')
@section('title','View Category')
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
                    <li class="breadcrumb-item active">View</li>
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
            @if (session('success'))
              <div class="alert alert-success" role="alert">
                  {{ session('success') }}
              </div>
            @endif
            @if (session('error'))
              <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
              </div>
            @endif
          <div class="col-md-10">
            <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Go Back</a>
            {!! Form::open(['route' => ['backend.category.destroy',$data['record']->id],'method' => 'DELETE','style'=>'display:inline-block;float:right;margin-left:5px']) !!}
              {!! Form::submit('Trash',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a href="{{route('backend.category.edit',$data['record']->id)}}" class="btn btn-warning float-right"><i class="fas fa-edit"></i>Edit </a>
            <table class="table table-bordered">
              <tbody>
              <tr>
                  <th>Name</th>
                  <td>{{$data['record']->name}}</td>
              </tr>
              <tr>
                  <th>Rank</th>
                  <td>{{$data['record']->rank}}</td>
              </tr>
              <tr>
                  <th>Slug</th>
                  <td>{{$data['record']->slug}}</td>
              </tr>
              <tr>
                  <th>Short Description</th>
                  <td>{{$data['record']->short_description}}</td>
              </tr>
              <tr>
                  <th>Description</th>
                  <td>{!! $data['record']->description !!}</td>
              </tr>
              <tr>
                  <th>Meta Keyword</th>
                  <td>{{$data['record']->meta_keyword}}</td>
              </tr>
              <tr>
                  <th>Meta Title</th>
                  <td>{{$data['record']->meta_title}}</td>
              </tr>
              <tr>
                  <th>Meta Description</th>
                  <td>{!! $data['record']->meta_description !!}</td>
              </tr>
              <tr>
                  <th>Status</th>
                  <td>
                      @if ($data['record']->status == 1)
                          <span class="text-success">Active</span>
                      @else
                          <span class="text-danger">De Active</span>
                      @endif
                  </td>
                </tr>
              <tr>
                  <th>Image</th>
                  <td><img src="{{ asset('images/backend/category/'.$data['record']->image)}}" alt="image" style="height:100px;"></td>
              </tr>
              <tr>
                  <th>Created At</th>
                  <td>{{$data['record']->created_at->format('Y-m-d')}}</td>
              </tr>
              <tr>
                  <th>Update At</th>
                  <td>{{$data['record']->updated_at->format('Y-m-d')}}</td>
              </tr>
              <tr>
                  <th>Created By</th>
                  <td>{{$data['record']->createdBy->name}}</td>
              </tr>
             
              <tr>
                  <th>Updated By</th>
                  <td>
                      @if(!empty($data['record']->updatedBy))
                          {{$data['record']->updatedBy->name}}
                      @endif
                  </td>
              </tr>
              </tbody>
          </table>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection