<div class="modal fade" id="modalRegisterCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <button type="button" class="close btn-close-form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <div class="alert alert-success">@lang('course.confirm_register')</div>
                <div class="row">
                    <div class="col-md-5">
                        <p>@lang('course.current_coin')</p>
                    </div>
                    <div class="col-md-2 show-coin-user"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p>@lang('course.coin_register')</p>
                    </div>
                    <div class="col-md-2 show-price-course"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p>@lang('course.remain')</p>
                    </div>
                    <div class="col-md-2 result-register-course"></div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        {{ Form::open(['route' => 'register-course', 'id' => 'registerCourse']) }}
                            {{ Form::submit(trans('course.register'), ['class' => 'btn btn-success form-control']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
