@extends('backend.layouts.master')
@section('title','List SubCategory')
@section('main-content')
<div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">SubCategory Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.subcategory.index')}}">SubCategory</a></li>
                    <li class="breadcrumb-item active">List</li>
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
            <a href="{{route('backend.subcategory.create')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Create SubCategory</a>
            <a href="{{route('backend.subcategory.trash')}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Go to Trash</a><br><br>

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
                @forelse($data['subcategories'] as $subcategory)
                    <tr>
                        <td>{{$loop->iteration+($data['subcategories']->currentPage()-1)*5}}</td>
                        <td>{{$subcategory->name}}</td>
                        <td>{{$subcategory->rank}}</td>
                        <td>
                          @if ($subcategory->status == 1)
                              <span class="text-success">Active</span>
                          @else
                              <span class="text-danger">De Active</span>
                          @endif      
                        </td>
                        <td>
                            <a href="{{route('backend.subcategory.edit',$subcategory->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('backend.subcategory.show',$subcategory->id)}}" class="btn btn-info btn-sm">Show</a>
                            {!! Form::open(['route' => ['backend.subcategory.destroy',$subcategory->id],'method' => 'DELETE','style'=>'display:inline-block']) !!}
                              {!! Form::submit('Trash',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">SubCategory not found</td>
                    </tr>
                @endforelse

                <tr> <td colspan="5" style="text-align: right">{{ $data['subcategories']->onEachSide(5)->links() }}</td></tr>
                </tbody>
            </table>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection