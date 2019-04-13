<div class="list-menu-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="row" >
                    <div class="col-md-6 text-center">
                        <a href="" class="title-profile">@lang('profile.information')</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="" class="title-profile">@lang('profile.add_coin')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a href="{{ route('list-post-user') }}" class="title-profile">@lang('lang.list_post')</a>
                    </div>
                    <div class="col-md-6 text-center">
                        @if (Auth::user()->role == config('settings.user'))
                            <a href="{{ route('list-course-register') }}" class="title-profile">@lang('lang.list_course')</a>
                        @else
                            <a href="{{ route('management-course') }}" class="title-profile">@lang('lang.list_course')</a>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
