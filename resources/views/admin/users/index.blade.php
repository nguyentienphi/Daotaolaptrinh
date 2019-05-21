@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ trans('list_user.title') }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(!$users->isEmpty())
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>{{ trans('list_user.table.name') }}</th>
                                <th>{{ trans('list_user.table.email') }}</th>
                                <th>{{ trans('list_user.table.coin_number') }}</th>
                                <th>{{ trans('list_user.table.role') }}</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                        <td>{{ isset($user->name) ? $user->name : '' }}</td>
                                        <td>{{ isset($user->email) ? $user->email : '' }}</td>
                                        <td>{{ isset($user->coin_number) ? $user->coin_number : '' }}</td>
                                        <td>{{ isset($user->role) ? $user->role : '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger">Xoá</a>
                                         </tr>
                            @endforeach
                        </table>
                        @else
                            <div class="single_course">
                                @include('clients.layouts.empty')
                            </div>
                        @endif
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
