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
                        @if(!$posts->isEmpty())
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>{{ trans('list_posts.table.id') }}</th>
                                <th>{{ trans('list_posts.table.user') }}</th>
                                <th>{{ trans('list_posts.table.category') }}</th>
                                <th>{{ trans('list_posts.table.title') }}</th>
                                <th>{{ trans('list_posts.table.description') }}</th>
                                <th>{{ trans('list_posts.table.function') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ isset($post->id) ? $post->id : '' }}</td>
                                    <td>{{ $post->getUserName() }}</td>
                                    <td>{{ $post->getNameCategory() }}</td>
                                    <td>{{ isset($post->title) ? $post->title : '' }}</td>
                                    <td>{!! isset($post->content) ? $post->content : '' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                                        <a href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-danger">Xoá</a>
                                </tr>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="single_course">
                                @include('clients.layouts.empty')
                            </div>
                        @endif
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
