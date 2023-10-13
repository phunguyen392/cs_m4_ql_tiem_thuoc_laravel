<<<<<<< HEAD

@extends('admin.master');
@section('content')

<form class="container" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
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

    <button type="submit" class="btn btn-primary">Add</button>
    <a href="{{route('categories.index')}}" class="btn btn-warning">BACK</a>
    
</form>
<style>
    .container {
   display: flex;
   justify-content: center;
   text-align: center;
}

</style>
@endsection
