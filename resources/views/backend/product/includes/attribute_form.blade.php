<table class="table table-striped table-bordered" id="attribute_wrapper">
    <tr>
        <th>Attribute</th>
        <th>Value</th>
        <th>Action</th>
    </tr>
        {{--@if(isset($data['record']))--}} 
        {{--@foreach($data['record']->attributes as $attribute)--}}
        {{-- <tr>--}}
            {{--<td>--}}
                {{--<input type="hidden" name="old_attribute_list[]" class="form-control count_attribute" value="{{$attribute->id}}"/>--}}
                {{--    {!! Form::select('attribute_id[]',$data['attributes'],$attribute->attribute_id,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}   --}}
                {{--</td>--}}
                    {{--<td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value" value="{{$attribute->attribute_value}}"/></td>--}}
                    {{--<td>--}}
                        {{--<button id="{{$attribute->id}}" class="btn btn-danger remove_row"><i class="fa fa-trash"></i></button>--}}
                    {{--<a id="{{$data['record']->id}}" class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>--}}
                    {{--</td> --}}
                        {{--</tr> --}}
        {{--@endforeach--}}
    {{--@else--}}
        <tr>
            <td>
                {!! Form::select('attribute_id[]',$data['attributes'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}
            </td>
            <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>
            <td>
                
            </td>
        </tr>
    {{--@endif--}}
</table>
<button class="btn btn-info" type="button" id="addMoreAttribute" style="margin-bottom: 20px">
    <i class="fa fa-plus"></i>
    Add
</button>
