<div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name',null,['class' => 'form-control','placeholder' => "Enter catgeory name"]) !!}
    @error('name')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug','Slug') !!}
    {!! Form::text('slug',null,['class' => 'form-control','placeholder' => "Enter Slug"]) !!}
    @error('slug')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::radio('status', 1,['id' => 'status_active']) !!} Active
    {!! Form::radio('status', 0,true,['id' => 'status_deactive']) !!} De-Active
</div>
<a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
{!! Form::submit($button,['class'=>'btn btn-primary'])!!}