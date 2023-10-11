
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