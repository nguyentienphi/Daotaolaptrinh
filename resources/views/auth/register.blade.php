<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                    <strong class="title-register">@lang('lang.register')</strong>
                </h3>
                <button type="button" class="close btn-close-form" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                {{ Form::open() }}
                    {{ Form::label('name', trans('lang.name') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-register']) }}
                        <span class="help-block name-messages"></span>
                    <div class="md-form mb-5">
                        {{ Form::text('name', old('name'), [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.name_placeholder'),
                            'id' => 'name'
                        ]) }}
                    </div>
                    <div class="md-form mb-5">
                        {{ Form::label('email', trans('lang.email') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-register']) }}
                        <span class="help-block email-messages"></span>
                        {{ Form::email('email', old('email'), [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.email_placeholder'),
                            'id' => 'email-register'
                        ]) }}
                    </div>
                    <div class="md-form mb-5">
                        {{ Form::label('password', trans('lang.password') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-register']) }}
                        <span class="help-block password-messages"></span>
                        {{ Form::password('password', [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.password_placeholder'),
                            'id' => 'password-register'
                        ]) }}
                    </div>
                    <div class="md-form mb-3">
                        {{ Form::label('password_confirmation', trans('lang.password_confirmation') . '(*)', ['data-error' => ' ', 'data-success' => ' ', 'class' => 'label-register']) }}
                        <span class="help-block password-confirmation-messages"></span>
                        {{ Form::password('password_confirmation', [
                            'class' => 'form-control validate input',
                            'placeholder' => trans('lang.password_placeholder'),
                            'id' => 'password-confirm'
                        ]) }}
                    </div>
                    <div class="text-center mb-3">
                        {{ Form::button(trans('lang.register'), ['type' => 'submit', 'class' => 'btn blue-gradient btn-block btn-rounded z-depth-1a', ]) }}
                    </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">
                    @lang('lang.already_has_an_account')
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#modalLogin" class="blue-text ml-1">
                        @lang('lang.login')
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
