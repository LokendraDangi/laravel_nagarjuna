<table class="table table-bordered">
    <tr>
        <th>SN</th>
        <th>Attribute</th>
        <th>Value</th>
        <th>Status</th>
    </tr>
    @forelse($data['record']->attributes as $attribute)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$attribute->attribute->name}}</td>
            <td>{{$attribute->attribute_value}}</td>
            <td>
                @include('backend.includes.display_status',['status'=>$attribute->status])
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" bgcolor="#5f9ea0">Attribute not found</td>
        </tr>
    @endforelse
</table>