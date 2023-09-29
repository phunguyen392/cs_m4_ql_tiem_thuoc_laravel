@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS của Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Category</title>
</head>

<body>
    <div class="text-end">
        <a href="{{ route('categories.create') }}"><br>
            <button type="button" class="btn btn-info">New Add</button></a>
    </div>
    <div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>TT</th>

                    <th>Category Name</th>
                    <th>Description</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key=>$cate )

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cate->category_name}}</td>
                    <td>{{$cate->description}}</td>
                    <td>
                        <div class="d-flex">
                            <form>

                                <a href="{{ route('categories.edit', ['category' => $cate->id]) }}" class="btn btn-primary">Edit</a>
                            </form>

                            <form action="{{ route('categories.softdeletes', $cate->id) }}" method="POST">                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('categories.show', ['category' => $cate->id]) }}" class="btn btn-success">Show</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<a href="/logout">đăng xuất</a>

    {{$categories->links()}}
</body>

</html>
@endsection
