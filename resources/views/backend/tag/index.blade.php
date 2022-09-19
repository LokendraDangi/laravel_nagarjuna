@extends('backend.layouts.master')
@section('title','List tag')
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
            <a href="{{route('backend.tag.create')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Create tag</a>
            <a href="{{route('backend.tag.trash')}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Go to Trash</a><br><br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data['records'] as $record)
                    <tr>
                        <td>{{$loop->iteration+($data['records']->currentPage()-1)*5}}</td>
                        <td>{{$record->name}}</td>
                        
                        <td>
                          @if ($record->status == 1)
                              <span class="text-success">Active</span>
                          @else
                              <span class="text-danger">De Active</span>
                          @endif      
                        </td>
                        <td>
                          {{$record->created_at->format('Y-m-d')}}
                        </td>
                        <td>
                            <a href="{{route('backend.tag.edit',$record->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('backend.tag.show',$record->id)}}" class="btn btn-info btn-sm">Show</a>
                            {!! Form::open(['route' => ['backend.tag.destroy',$record->id],'method' => 'DELETE','style'=>'display:inline-block']) !!}
                              {!! Form::submit('Trash',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">tag not found</td>
                    </tr>
                @endforelse

                <tr> <td colspan="5" style="text-align: right">{{ $data['records']->onEachSide(5)->links() }}</td></tr>
                </tbody>
            </table>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection