@section('title', trans('test.add'))
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center">
                <h2 class="mb-3">@lang('test.add')
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 form-create-test">
                {{ Form::open(['route' => 'store-test', 'id' => 'formCreateTest']) }}
                    {{ Form::hidden('course', $id) }}
                    <div class="box-add-test">
                        <div class="form-group">
                            {{ Form::label('name_test', trans('test.name')) }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => trans('test.placeholder_name'), 'id' => 'name-test']) }}
                            <span class="name-messages" class="error"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('time_test', trans('test.time')) }}
                            {{ Form::number('time', '', ['class' => 'form-control', 'placeholder' => trans('test.placeholder_time')]) }}
                        </div>
                    </div>
                    <div class="box-add-question">
                        <div class="form-group" id="box_show_question_1">
                            {{ Form::label('name_test', trans('test.question_first')) }}
                            {{ Form::text('question[question_1]', '', ['class' => 'form-control', 'id' => 'question_1']) }}
                            <div class="element-content">
                                <div class="element-questions">
                                    <div class="box-check-correct">
                                        <input type="radio" name="check_correct_question[question_1]" class="check">
                                    </div>
                                    <div class="element-answer">
                                        <input type="text"  class="form-control option-anwser" value="Tùy chọn 1" name="answer[question_1][]" id="answer[question_1][]" true>
                                    </div>
                                </div>
                                <div class="box-option-answer">
                                    <div class="ti-icons"><span><i class="ti-control-record"></i></span></div>
                                    <div class="box-add-option-answer">
                                        <span class="add-option-answer">@lang('test.add_option')</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="position: relative;">
                            <span class="add-question">@lang('test.add_question')</span>
                        </div>
                    </div>
                    <div>
                        {{ Form::submit(trans('test.store'), ['class' => 'btn btn-primary', 'id' => 'submitTest']) }}
                    </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
@section('js')
    {{ Html::script(asset('js/clients/jquery.validate.min.js')) }}
    {{ Html::script(asset('js/clients/tesjs.js')) }}
@endsection
