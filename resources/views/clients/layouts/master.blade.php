@include('clients.layouts.header')
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center" style="margin-top: 110px">
                        <p class="text-uppercase">@lang('lang.content_banner')</p>
                        <div class="row" style="margin-top: 10px">
                        <div class="col-md-3"></div>
                        <div class="col-xl-2 col-md-2 col-sm-2 col-5">
                            <div class="counter" data-count="300">
                                300
                            </div> <span class="digit">User</span>
                        </div>
                        <div class="col-xl-2 col-md-2 col-sm-2 col-5 ">
                            <div class="counter" data-count="300">
                                200
                            </div> <span class="digit">Post</span>
                        </div>
                        <div class="col-xl-2 col-md-2 col-sm-2 col-5 ">
                            <div class="counter" data-count="300">
                                50
                            </div> <span class="digit">Course</span>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
    </section>
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
                <h2 class="mb-3">@lang('lang.awsome')</h2>
                <p>@lang('lang.title_awsome')</p>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="single_feature">
                    <div class="icon"><span class="flaticon-student"></span></div>
                    <div class="desc">
                        <h3 class="mt-3 mb-2" style="text-align: center;">@lang('lang.question_title')</h3>
                        <p>@lang('lang.answer_title')</p>
                    </div>
                    <br>
                    <div class="col-md-8">
                        <ul style="list-style-type: none;">
                            <li class="process_item">
                                <div class="counter_item">@lang('lang.feature_1')</div>
                                <div class="title_item" ">
                                    <h3>@lang('lang.title_feature_1')</h3>
                                    <p>@lang('lang.body_feature_1')</p>
                                </div>
                            </li>
                            <li class="process_item">
                                <div class="counter_item">@lang('lang.feature_2')</div>
                                <div class="title_item" ">
                                    <h3>@lang('lang.title_feature_2')</h3>
                                    <p>@lang('lang.body_feature_2')</p>
                                </div>
                            </li>
                            <li class="process_item">
                                <div class="counter_item">@lang('lang.feature_3')</div>
                                <div class="title_item" ">
                                    <h3>@lang('lang.title_feature_3')</h3>
                                    <p>@lang('lang.body_feature_3')</p>
                                </div>
                            </li>
                            <li class="process_item">
                                <div class="counter_item">@lang('lang.feature_4')</div>
                                <div class="title_item" ">
                                    <h3>@lang('lang.title_feature_4')</h3>
                                    <p>@lang('lang.body_feature_4')</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
@include('clients.layouts.footer')
