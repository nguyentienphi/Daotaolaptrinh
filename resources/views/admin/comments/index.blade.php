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
                        @if(!$comments->isEmpty())
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>{{ trans('list_comment.table.id') }}</th>
                                <th>{{ trans('list_comment.table.target') }}</th>
                                <th>{{ trans('list_comment.table.description') }}</th>
                                <th>{{ trans('list_comment.table.function') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ isset($comment->id) ? $comment->id : '' }}</td>
<<<<<<< 17daff9136224c658be14f5d722672b54955c6b5
                                    <td>{{ $comment->getNameRelation() }}</td>
=======
                                    <td>{{ isset($comment-> ) ? $comment->target_id : '' }}</td>
>>>>>>> comment video
                                    <td>{{ isset($comment->content) ? $comment->content : '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.comments.destroy', $comment->id) }}" class="btn btn-danger">Xoá</a>
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
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
