@extends('backend.layouts.master')
@section('title',$title)
@section('panel',$panel)
@section('entryoptionactive','active')
@section('productactive','active')
@section('content')
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
            @include('layouts.flash_message')
            <a href="{{route($base_route.'index')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">{{$panel}} Home</a><br><br>

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
                            @include('backend.includes.display_status',['status'=>$record->status])
                        </td>
                        <td>
                            <form action="{{route($base_route.'restore',$record->id)}}" method="post" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>

                            <form action="{{route($base_route.'force_delete',$record->id)}}" method="post" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">{{$panel}} deleted items not found</td>
                    </tr>

                @endforelse
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@endsection
