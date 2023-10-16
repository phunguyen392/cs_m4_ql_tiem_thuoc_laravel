@extends('admin.master')
@section('content')
<main class="page-content">
    <div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">

                </header>
                <hr>
              
                <nav aria-label="breadcrumb">
                    @if (Auth::user()->hasPermission('Group_create'))
                     <a href="{{ route('groups.create') }}" class="btn btn-success">{{ __('language.new add') }}</a>
                    @endif
                </nav>
                <div>
                    <table class="table" ui-jq="footable"
                        ui-options='{
    "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
    <div class="card">
        <div class="card-body">
            <div class="panel-heading">
                <h2 class="offset-4">{{ __('language.mem') }}</h2>
            </div>
            <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>{{ __('language.tt') }}</th>
                                <th>{{ __('language.po') }}</th>
                                {{-- <th>Người đảm nhận</th> --}}
                                <th data-breakpoints="xs">{{ __('language.action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($groups as $key => $group)
                                <tr class="text-center" data-expanded="true" class="item-{{ $key }}">
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $group->name }} </td>
                                    {{-- @dd(1); --}}
                                    {{-- <td>{{ $group->$user->name }} </td> --}}

                                    {{-- <td>Hiện có {{ count($group->users) }}</td> --}}
                                    <td>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a class="btn btn-primary " href="{{route('groups.detail', $group->id)}}">{{ __('language.au') }}</a>
                                            @endif
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a href="{{ route('groups.edit', $group->id) }}"
                                                class="btn btn-warning">{{ __('language.edit') }}</a>
                                            @endif
                                                @if (Auth::user()->hasPermission('Group_forceDelete'))
                                                <a data-href="{{ route('groups.destroy', $group->id) }}"
                                                    id="{{ $group->id }}" class="btn btn-danger sm deleteIcon">{{ __('language.delete') }}</a>
                                                @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $groups->appends(request()->query()) }}
                </div>
            </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @php
       if(Session::has('addgroup')){
       @endphp
       Swal.fire({
            icon: 'success',
            title: 'Tạo quyền xong rồi nhé!',
            text: "Cấp quyền ngay nhé",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
    </script>
    <script>



        $(document).on('click', '.deleteIcon', function(e) {
            // e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Are you redy?',
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Tệp của bạn đã bị xóa!',
                                'success'
                            )
                            $('.item-' + id).remove();
                        }

                    });
                }
            })
        });
    </script>
    </div>
</main>
@endsection