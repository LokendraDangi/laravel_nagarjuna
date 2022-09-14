<div class="form-group">
    {!! Form::label('meta_keyword','Meta Keyword*') !!}
    {!! Form::textarea('meta_keyword',null,['class' => 'form-control','placeholder' => "Enter meta_keyword" ,'rows' =>3]) !!}
    @include('backend.includes.form_validation_error_message',['field' => 'meta_keyword'])
</div>
<div class="form-group">
    {!! Form::label('meta_title','Meta Title*') !!}
    {!! Form::textarea('meta_title',null,['class' => 'form-control','placeholder' => "Enter Meta Title" ,'rows' =>3]) !!}
    @include('backend.includes.form_validation_error_message',['field' => 'meta_title'])
</div>
<div class="form-group">
    {!! Form::label('meta_description','Meta Description*') !!}
    {!! Form::textarea('meta_description',null,['class' => 'form-control','placeholder' => "Enter Meta Description" ,'rows' =>3]) !!}
    @include('backend.includes.form_validation_error_message',['field' => 'meta_description'])
</div>