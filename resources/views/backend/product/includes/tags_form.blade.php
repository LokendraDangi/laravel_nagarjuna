<div class="form-group">
{!! Form::label('tag_id','Tag Id*') !!}
    @if(isset($data['record']))
        {!! Form::select('tag_id[]',$data['tags'],$data['selected_tags'],['class' => 'form-control multiple_tags','multiple'=> 'multiple']) !!}
    @else
        {!! Form::select('tag_id[]',$data['tags'],null,['class' => 'form-control multiple_tags','multiple'=> 'multiple']) !!}
    @endif
    @error('tag_id')
    <span class="text text-danger">{{ $message }}</span>
    @enderror
</div>
