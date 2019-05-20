@section('title', 'post')
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>

    <div class="container content-post">
        <div class="row post">
            <div class="col-lg-11 course_details_left">
                @if (count($posts))
                    @foreach ($posts as $post)


                            <div class="content_wrapper">
                            <div>
                                {{ Html::image(asset($post->user->avatar), '', ['class' => 'img-user-post']) }}
                            </div>
                            <div class="content title-post">
                                <input type="hidden" name="postId" value="{{ $post->id }}">
                                <a class="title author-post" href="">{{ $post->user->name }}</a>
                                <p>
                                    <a href="javascript:void(0)" class="color-title-post view-post">{{ $post->title }}</a>
                                </p>
                                <p>
                                    <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                                    <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comments) }}</span>
                                </p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="paginate">
                        {{ $posts->links() }}
                    </div>
                @else
                    @include('clients.layouts.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
