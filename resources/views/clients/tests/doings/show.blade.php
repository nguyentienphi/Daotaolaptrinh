@section('title', $test->name)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center">
                <h2 class="mb-3">{{ $test->name }}</h2>
                <p class="countdown-time-start" style="display: block;">
                <span class="hidden-md-up">Thời gian:</span>
                <span class="timer" id="time">{{$test->time}} : 00</span>
                </p>
            </div>
        </div>
    </div>
    <div class="container show-content-test">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                {{ Form::open(['route' => 'test.complete', 'id' => 'doingTest']) }}
                    <input type="hidden" name="testId" value="{{ $test->id }}">
                    @foreach ($questions as $question)
                        <div class="show-detail-question">
                            <div class="row questions">
                                Câu {{ $loop->iteration }} : {{ $question->content }}
                                <input type="hidden" name="question[question{{$question->id}}]" value="{{ $question->id }}">
                            </div>
                            <div class="box-show-answer">
                                @foreach ($question->answers as $answer)
                                    <div class="row">
                                        <label>
                                            <input type="radio" name="answer[question{{$question->id}}]" value="{{ $answer->id }}">
                                            <span>
                                                {{ $answer->content }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div>
                        {{ Form::submit('Kết thúc', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade display-modal" id="checkEndTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @lang('test.check_end_test')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.no')</button>
                    <button type="button" class="btn btn-primary end-test">@lang('lang.ok')</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade display-modal" id="infomationEndTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @lang('test.information_end_time')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
   {{ Html::script(asset('js/clients/exercise.js')) }}
@endsection

