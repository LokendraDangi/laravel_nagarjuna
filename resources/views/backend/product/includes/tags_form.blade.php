<div class="form-group">
{!! Form::label('tag_id','Tag Id*') !!}
    @if(isset($data['record']))
{!! Form::select('tag_id[]',$data['tags'],$data['selected_tags'],['class' => 'form-control multiple_tags','multiple'=> 'multiple']) !!}
    @else
        {!! Form::select('tag_id[]',$data['tags'],null,['class' => 'form-control multiple_tags','multiple'=> 'multiple']) !!}
    @endif
        @include('backend.includes.form_validation_error_message',['field' => 'tag_id'])
</div>
