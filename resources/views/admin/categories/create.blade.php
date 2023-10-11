<<<<<<< HEAD

@extends('admin.master');
@section('content')
<li class="nav-item dropdown">
    <select class=" changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
    </select>
</li>
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>{{ __('language.new add') }}</h1>
    <p>

        <label for="category_name">{{ __('language.category') }}</label><br>
        <input id="category_name" name="category_name" type="text" value=""><br>
        @error('category_name')
        <div style="color: blue">{{ $message }}</div>
            
        @enderror
    </p>

    <p>
        </p>
        <label for="description">{{ __('language.description') }}</label><br>
        <textarea id="description" name="description"></textarea><br>        


    <input type="submit" name="submit" value="Add" />
</form>

@endsection
=======
@extends('admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="text-center">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form class="form-control" action="{{ route('categories.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <h1>New Add</h1>
                        <p>

                            <label for="category_name">Create Name:</label><br>
                            <input id="category_name" name="category_name" type="text" value=""><br>
                            @error('category_name')
                            <div style="color: blue">{{ $message }}</div>
                        @enderror
                        </p>

                        <p>
                        </p>
                        <label for="description">Description:</label><br>
                        <input id="description" name="description" type="text" value=""><br>


<br>
                       <div>
                        <button class="btn btn-primary" type="submit" >add</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
>>>>>>> 8b1be9099ff3a954a44c8096a323bbbe50112dfa
