<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                    <strong class="title-login">@lang('lang.login')</strong>
                </h3>
                <button type="button" class="close btn-close-form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                {{ Form::open(['route' => 'login', 'id' => 'formLogin']) }}
                    {{ Form::label('email', trans('lang.email') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-login']) }}
                    <div class="md-form mb-5">
                        {{ Form::email('email', old('email'), [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.email_placeholder'),
                            'id' => 'email'
                        ]) }}
                        <span class="help-block login-messages"></span>
                    </div>
                    <div class="md-form pb-3">
                        {{ Form::label('password', trans('lang.password') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-login']) }}
                        {{ Form::password('password', [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.password_placeholder'),
                            'id' => 'password'
                        ]) }}
                        <span class="help-block login-messages-password"></span>
                        <p class="font-small blue-text d-flex justify-content-end">
                            <a data-toggle="modal" data-dismiss="modal" data-target="#modalForgotPassword" href="javascript:void(0)" class="blue-text ml-1">
                                @lang('lang.forgot') @lang('lang.password')&#63;
                            </a>
                        </p>
                    </div>
                    <div class="text-center mb-3">
                        {{ Form::button(trans('lang.login'), ['type' => 'submit', 'class' => 'btn blue-gradient btn-block btn-rounded z-depth-1a', 'id' => 'btn-signin']) }}
                    </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">
                    @lang('lang.not_a_member')
                    <a href="javascript::void(0)" data-dismiss="modal" data-toggle="modal" data-target="#modalRegister" class="blue-text ml-1">
                        @lang('lang.register')
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
