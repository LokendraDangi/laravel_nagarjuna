@extends('backend.layouts.master')
@section('title','Category Trash')
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
                    <li class="breadcrumb-item active">Trash</li>
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
            <a href="{{route('backend.category.index')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> Category List</a>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data['records'] as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->rank}}</td>
                        <td>
                          @if ($record->status == 1)
                              <span class="text-success">Active</span>
                          @else
                              <span class="text-danger">De Active</span>
                          @endif 
                        </td>
                        <td>
                            {!! Form::open(['route' => ['backend.category.restore',$record->id],'method' => 'PUT','style'=>'display:inline-block']) !!}
                              {!! Form::submit('Restore',['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                            {!! Form::open(['route' => ['backend.category.force_delete',$record->id],'method' => 'DELETE','style'=>'display:inline-block']) !!}
                              {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Category deleted items not found</td>
                    </tr>

                @endforelse
                </tbody>
            </table>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection