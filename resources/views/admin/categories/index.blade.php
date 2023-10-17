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
        <div class="card">

            <div class="card-body">
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
                                {{-- <th>{{__('language.description')}}</th> --}}

                                <th>{{ __('language.action') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $cate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cate->category_name }}</td>
                                    {{-- <td>{!! $cate->description !!}</td> --}}
                                    <td>
                                        <div class="btn-group">

                                            <a href="{{ route('categories.edit', $cate->id) }}"
                                                class="btn btn-primary">{{ __('language.edit') }}</a>
                                            <form action="{{ route('categories.softdeletes', $cate->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('language.delete') }}</button>
                                            </form>
                                            <a href="{{ route('categories.show', ['category' => $cate->id]) }}"
                                                class="btn btn-success">{{ __('language.show') }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $categories->links() }}
            </div>
        </div>
    </body>

    </html>
@endsection
