@extends('admin.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading-container text-center" style="color: rgb(127, 17, 83);">
                        <h1>{{ __('language.new add') }}</h1>
                    </div>
                    <div class="form-group text-center">
                        <label class="text-center" for="category_name">{{ __('language.category') }} :</label><br>
                        <input id="category_name" name="category_name" type="text"
                            class="form-control-sm border border-primary " value="">
                        @error('category_name')
                            <div style="color: blue">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <label for="description">{{ __('language.description') }} :</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
            </div>
            <div class="form-group text-center ">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{ route('categories.index') }}" class="btn btn-warning ml-auto">BACK</a>
            </div>
        </form>
        </div>
    </div>
@endsection
