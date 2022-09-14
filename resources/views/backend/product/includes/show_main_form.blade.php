<table class="table table-bordered">
    <tbody>
    <tr>
        <th>title</th>
        <td>{{$data['record']->title}}</td>
    </tr>
    <tr>
        <th>price</th>
        <td>{{$data['record']->price}}</td>
    </tr>
    <tr>
        <th>discount</th>
        <td>{{$data['record']->discount}}</td>
    </tr>
    <tr>
        <th>stock</th>
        <td>{{$data['record']->stock}}</td>
    </tr>
    <tr>
        <th>quantity</th>
        <td>{{$data['record']->quantity}}</td>
    </tr>
    <tr>
        <th>short_description</th>
        <td>{{$data['record']->short_description}}</td>
    </tr>
    <tr>
        <th>specification</th>
        <td>{{$data['record']->specification}}</td>
    </tr>
    <tr>
        <th>description</th>
        <td>{{$data['record']->description}}</td>
    </tr>
    <tr>
        <th>Category</th>
        <td>{{$data['record']->categories->name}}</td>
    </tr>
    <tr>
        <th>SubCategory</th>
        <td>{{$data['record']->subcategories->name}}</td>
    </tr>
    <tr>
        <th>Unit</th>
        <td>{{$data['record']->units->name}}</td>
    </tr>
    <tr>
        <th>Created By</th>
        <td>{{$data['record']->createdBy->name}} || Time: {{$data['record']->created_at}}</td>
    </tr>
    <tr>
        <th>Updated By</th>
        <td>
            @if(!empty($data['record']->updatedBy))
                {{$data['record']->updatedBy->name}} || Time:{{$data['record']->updated_at}}
            @endif
        </td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{!!$data['record']->description!!}</td>
    </tr>
    <tr>
        <th>feature_product</th>
        <td>{{$data['record']->feature_product}}</td>
    </tr><tr>
        <th>flash_product</th>
        <td>{{$data['record']->flash_product}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($data['record']->status == 1)
                <span class="text-success">Active</span>
            @else
                <span class="text-danger">De Active</span>
            @endif
        </td>
    </tr>
    </tbody>
</table>







