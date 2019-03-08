@section('title', trans('lang.create_post'))
@include('clients.layouts.header')
    <section class="section_gap"></section>
    <div class="container">
        {{ Form::open() }}
            <div class="form-group">
                {{ Form::label(trans('lang.category')) }}
                {{ Form::select('category', ['git' => 'Git', 'php' => 'PHP'], null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label(trans('lang.title_create_post')) }}
                {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('Nội dung bài viết') }}
                {{ Form::textarea('content-post', '', ['class' => 'form-control', 'id' => 'post']) }}
            </div>
            <div class="form-group">
                {{ Form::button(trans('lang.save_post'), ['class' => 'btn btn-success btn-block']) }}
            </div>
        {{ Form::close() }}
    </div>
@include('clients.layouts.footer')
{{ Html::script(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')) }}
{{ Html::script(asset('js/clients/item.js')) }}
