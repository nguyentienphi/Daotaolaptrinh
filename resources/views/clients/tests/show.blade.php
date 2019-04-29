@section('title', $test->name)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center">
                <h2 class="mb-3">{{ $test->name }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                @foreach ($questions as $question)
                    <div class="show-detail-question">
                        <div class="row questions">
                            Câu {{ $loop->iteration }} : {{ $question->content }}
                        </div>
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        <div class="box-show-answer">
                            @foreach ($question->answers as $answer)
                                <div class="row">
                                    <label>
                                        <input type="radio" name="answer_question_{{$question->id}}" {{ $answer->is_right == 1 ? 'checked' : ''}} disabled>
                                        <span class="{{ $answer->is_right == config('settings.answer.correct') ? 'answer-correct' : ''}}">
                                            {{ $answer->content }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <h4 class="text-center">@lang('test.list_rating')</h4>
            </div>
        </div>
    </div>
@endsection
