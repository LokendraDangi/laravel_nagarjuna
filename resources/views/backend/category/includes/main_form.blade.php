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
    {!! Form::label('rank','Rank') !!}
    {!! Form::number('rank',null,['class' => 'form-control','placeholder' => "Enter Rank"]) !!}
    @error('rank')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('short_description','Short Decription') !!}
    {!! Form::text('short_description',null,['class' => 'form-control','placeholder' => "Enter Short Decription"]) !!}
    @error('short_description')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null,['class' => 'form-control','rows' =>5]) !!}
    @error('description')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('meta_keyword','Meta Keyword') !!}
    {!! Form::text('meta_keyword',null,['class' => 'form-control','placeholder' => "Enter meta Keyword"]) !!}
    @error('meta_keyword')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('meta_title','meta title') !!}
    {!! Form::text('meta_title',null,['class' => 'form-control','placeholder' => "Enter meta title"]) !!}
    @error('meta_title')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('meta_description','meta Description') !!}
    {!! Form::textarea('meta_description',null,['class' => 'form-control','rows' =>5]) !!}
    @error('meta_description')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('image','Image') !!}
    {!! Form::file('image',['accept'=>"image/*", 'class'=>"form-control"]) !!}
    @error('image')
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