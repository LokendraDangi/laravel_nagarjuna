<table class="table table-bordered">
    <tbody>
    <tr>
        <th>Tags</th>
        <td>
            @foreach ($data['record']->tags as $tags)
                <li>{{ $tags->name }}</li>
            @endforeach
        </td>
    </tr>
    </tbody>
</table>







