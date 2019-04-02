<div class="modal fade" id="modalcoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <button type="button" class="close btn-close-form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <div class="alert alert-danger">@lang('course.not_enought_coin')</div>
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
                        <p>@lang('course.missing')</p>
                    </div>
                    <div class="col-md-2 result-register-course"></div>
                </div>
                <div class="row">
                    <a href="javascript:void(0)" class="form-control btn btn-success">@lang('lang.add_coin')</a>
                </div>
            </div>
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">
                    <a href="">@lang('course.guide_addcoin')</a>
                </p>
            </div>
        </div>
    </div>
</div>
