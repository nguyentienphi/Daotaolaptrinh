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
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>{{ trans('list_courses.table.name') }}</th>
                                <th>{{ trans('list_courses.table.description') }}</th>
                                <th>{{ trans('list_courses.table.category') }}</th>
                                <th>{{ trans('list_courses.table.price') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ isset($course->name) ? $course->name : '' }}</td>
                                    <td>{{ isset($course->description) ? $course->description : '' }}</td>
                                    <td>{{  $course->nameCategory }}</td>
                                    <td>{{ isset($course->price) ? $course->price : '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
