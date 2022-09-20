
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
        <tr>
            <td>
                <input type="file" name="image_title[]" class="form-control"/></td>
            <td>
            </td>
        </tr>   
    </table>
    <button class="btn btn-info" type="button" id="addMoreImage"
            style="margin-bottom: 20px"> <i class="fa fa-plus"></i> Add</button>
</div>

