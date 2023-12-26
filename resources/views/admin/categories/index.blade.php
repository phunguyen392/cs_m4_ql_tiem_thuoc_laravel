@extends('admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Category</title>
    </head>

    <body>
        @include('admin.includes.global.alert')
        <div class="card">
        <div class="card-body">
        <div class="card-header">
            <div class="text-end">
                <a href="{{ route('categories.create') }}"><br>
                    <button type="button" class="btn btn-info">{{ __('language.new add') }}</button></a>
            </div>
            <div class="text-center">
                <h1 style="color: blue">{{ __('language.category') }}</h1>
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('language.tt') }}</th>
                            <th>{{ __('language.category') }}</th>
                            <th>{{ __('language.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('categories.edit', $item->id) }}"
                                            class="btn btn-primary">{{ __('language.edit') }}</a>
                                        <form action="{{ route('categories.softdeletes', $item->id) }}" method="POST"> @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">{{ __('language.delete') }}</button>
                                        </form>
                                        <a href="{{ route('categories.show', ['category' => $item->id]) }}"
                                            class="btn btn-success">{{ __('language.show') }}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $items->links() }}
        </div>
    </div>

    </div>

       
    </body>

    </html>
@endsection
