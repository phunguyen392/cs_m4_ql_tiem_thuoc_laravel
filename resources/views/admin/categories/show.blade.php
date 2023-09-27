<table border="1">
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Action</th>

    </tr>
    <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->description}}</td>
      <td>  
                <a href="{{route('categories.index')}}" class="btn btn-warning">BACK</a>
      </td>
    </tr>
</table>