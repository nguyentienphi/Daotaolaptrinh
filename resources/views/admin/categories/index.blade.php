@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Danh Mục</h2>
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
                        @if(!$categories->isEmpty())
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>{{ trans('list_category.table.id') }}</th>
                                    <th>{{ trans('list_category.table.name') }}</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ isset($category->id) ? $category->id : '' }}</td>
                                        <td>{{ isset($category->name) ? $category->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger">Xoá</a>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div class="single_course">
                                @include('clients.layouts.empty')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
