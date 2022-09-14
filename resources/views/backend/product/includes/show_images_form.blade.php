<table class="table table-bordered" id="image_list">
    <tr>
        <th>SN</th>
        <th>Image</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @forelse($data['record']->product_images as $image)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{asset($image_path.'150_150_'.$image->image_name)}}" alt="">
            </td>
            <td>{{$image->image_title}}</td>
            <td>
                @include('backend.includes.display_status',['status'=>$image->status])
            </td>
            {{--<td>--}}
                {{--<button id="{{$image->id}}" class="btn btn-danger delete_image">Delete</button>--}}
            {{--</td>--}}
        </tr>
    @empty
        <tr>
            <td colspan="4" bgcolor="#5f9ea0">Image not found</td>
        </tr>
    @endforelse
</table>