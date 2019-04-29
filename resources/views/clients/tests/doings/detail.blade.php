@section('title', 'dsfjkl')
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center">
                <h2 class="mb-3">@lang('test.detail')</h2>
            </div>
        </div>
    </div>
   <div class="container">
       <div class="row" style="margin-bottom: 20px">
           <div class="col-md-1"></div>
           <div class="col-md-7">
                <div class="box-result-detail">
                   <p>{{ trans('test.result_detail', ['point' => $point->point, 'questions' => count($test->questions)]) }}</p>
                    <p>
                        <button class="btn btn-primary view-detail">@lang('test.view_detail')</button>
                        <a href="{{ route('test.doing', $test->id) }}" class="btn btn-info">@lang('test.re_doing')</a>
                    </p>
                </div>
                <div class="show-detail">
                    @foreach($results as $result)
                        @if ($result->question->test->id == $test->id)
                            @php
                                static $i = 0;
                            @endphp
                            <div class="show-detail-question">
                                <div class="row questions">
                                    @php
                                        $i = $i +1;
                                    @endphp
                                    Câu {{ $i }} : {{ $result->question->content }}
                                 </div>
                                <div class="box-show-answer">
                                    @foreach($result->question->answers as $answer)
                                         <div class="row">
                                            <label>
                                                <input type="radio" name="" {{ $result->answer_id == $answer->id ? 'checked' : 'unchecked' }} disabled="disabled">
                                                @if ($result->answer_id == $answer->id && $answer->is_right== config('settings.answer.correct'))
                                                    <span class="answer-correct">
                                                        {{ $answer->content }}
                                                    </span>
                                                @elseif($result->answer_id == $answer->id && $answer->is_right == config('settings.answer.incorrect'))
                                                    <span class="answer-incorrect">
                                                        {{ $answer->content }}
                                                    </span>
                                                @else
                                                    <span>
                                                        {{ $answer->content }}
                                                    </span>
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
           </div>
           <div class="col-md-1"></div>
           <div class="col-md-3 box-result-detail" style="max-height: 700px">
                <div>
                    <h4 class="text-center">@lang('test.rank')</h4>
                    @foreach ($ranks as $rank)
                        <p>
                            {{ Html::image(asset($rank->user->avatar), '', ['class' => 'image-rank']) }}
                            <span>{{ $rank->user->name }}</span>
                        </p>
                    @endforeach
                </div>
           </div>
       </div>
   </div>
@endsection
