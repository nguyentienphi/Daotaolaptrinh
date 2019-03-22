<div class="row">
    {!! Form::open([
        'class' => 'form-search-list-post col-xl-12 push-xl-12 col-lg-12 push-lg-12 col-md-12 col-sm-12 col-xs-12']) !!}
        <div class="col-xl-3 push-xl-3 col-lg-3 push-lg-3 col-md-3 col-sm-3 col-xs-3">
            {!! Form::text('name', null, [
                'class' => 'form-control element-search-post',
                'placeholder' => trans('post.name_post')
            ]) !!}
        </div>
        <div class="col-xl-3 push-xl-3 col-lg-3 push-lg-3 col-md-3 col-sm-3 col-xs-3">
            {!! Form::select('status', [
            config('settings.status.approved') => trans('post.approved'),
            config('settings.status.waiting_approved') => trans('post.waiting_approved')
            ], null, ['class' => 'select-list-post element-search-post form-control', 'placeholder' => trans('post.status')]) !!}
        </div>
        <div class="col-xl-3 push-xl-3 col-lg-3 push-lg-3 col-md-3 col-sm-3 col-xs-3 btn-search-owner">
            <a href="javascript:void(0)"
                class="btn btn-info btn-search-post"
                data-toggle="tooltip"
                title="@lang('post.search')"
                data-url="">
                <i class="ti-search icons-search-post" aria-hidden="true"></i>
            </a>
        </div>
    {!! Form::close() !!}
</div>
