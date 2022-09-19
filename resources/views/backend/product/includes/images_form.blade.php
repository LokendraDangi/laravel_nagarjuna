
<div class="table-responsive">
    <div class="form-group">
        {!! Form::label('image_status','Status') !!}
        {!! Form::radio('image_status',1,['id'=>'basic_status_active']) !!} Active
        {!! Form::radio('image_status',0,true,['id'=>'basic_status_deactive']) !!} De Active
    </div>
    <table class="table table-striped table-bordered" id="image_wrapper">
        <tr>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @if(isset($data['record']))
            @foreach($data['record']->product_images as $images)
                <tr>
                    <td>
                        <input type="hidden" name="old_image_list[]" class="form-control count" value="{{$images->id}}"/>
                        <input type="file" name="product_image[]" class="form-control" value="{{$images->image_name}}"/>
                        <img src="{{asset($image_path.'150_150_'.$images->image_name)}}" alt=""></td>
                    <td>
                        <button id="{{$images->id}}" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>
                        {{--<a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>--}}
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td><input type="file" name="image_title[]" class="form-control"/></td>
            <td>
                <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endif
    </table>
    <button class="btn btn-info" type="button" id="addMoreImage"
            style="margin-bottom: 20px"> <i class="fa fa-plus"></i> Add</button>
</div>
