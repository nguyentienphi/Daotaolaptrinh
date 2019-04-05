@section('title', $post->title)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap"></section>
    <div class="container">
        {{ Form::open(['method' => 'PATCH', 'route' => ['post.update', $post->id], 'id' => 'formUpdatePost']) }}
            <div class="form-group">
                {{ Form::label(trans('lang.category')) }}
                {{ Form::text('category', $post->category->name, ['class' => 'form-control', 'readonly']) }}
            </div>
            <div class="form-group">
                {{ Form::label(trans('lang.title_create_post')) }}
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => trans('lang.title_post_content')]) }}
                <span class="message-title-post"></span>
            </div>
            <div class="form-group">
                {{ Form::label(trans('lang.content_post')) }}
                {{ Form::textarea('content', $post->content, ['class' => 'form-control', 'id' => 'post']) }}
                <span class="message-content-post"></span>
            </div>
            <div class="form-group">
                {{ Form::submit(trans('lang.update'), ['class' => 'btn btn-success btn-block', 'id' => 'createPost', 'data-url' => route('post.store')]) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection
@section('js')
    {{ Html::script(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')) }}
    {{ Html::script(asset('js/clients/item.js')) }}
    {{ Html::script(asset('js/clients/builder.js')) }}
@endsection
