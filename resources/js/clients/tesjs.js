$(document).ready(function () {
    window.onbeforeunload = function() {
        return 'Confirm reload';
    }

    $(function () {
        $(document).on('focus', '.option-anwser', function () {
           $(this).select();
        });
    });
    var i = 2;

    $(document).on('click', '.add-option-answer', function () {
        var element = $(this).parent().parent().parent().find('.element-questions')
        if (element.find('.button-close-option').length == 0) {
            element.append(`
            <div style="display: inline-block;" class="button-close-option">
            <span><i class="ti-close"></i></span>
            </div>`
        );
        }

        $(this).closest('div.box-option-answer').before(`
            <div style="margin-bottom:10px" class="element-questions">
                <div style="display: inline-block;">
                    <input type="radio" name="check_correct_question[question_`+question+`]" class="check">
                </div>
                <div style="height: 25px;display: inline-block; width: 85%">
                    <input type="text"  class="form-control option-anwser" value="Tùy chọn ` + i +`" name="answer[question_`+question+`][]">
                </div>
                <div style="display: inline-block;"><span"><i class="ti-close"></i></span></div>
            </div>
        `);
        i++;
    });

    var question = 1;
    $(document).on('click', '.add-question', function () {
        i = 2;
        ++question;
        $(this).parent().before(`
            <div class="form-group" id="box_show_question_` + question +`">
                <label>Câu `+ question +`</label>
                <input type="text" class="form-control" name="question[question_`+question+`]" id = "question_`+question+`">
                <div style="margin-top: 10px;" class="element-content">
                    <div style="margin-bottom: 10px" class="element-questions">
                        <div style="display: inline-block;">
                            <input type="radio" name="check_correct_question[question_`+question+`]" class="check">
                        </div>
                        <div style="height: 25px;display: inline-block; width: 85%">
                            <input type="text"  class="form-control option-anwser" value="Tùy chọn 1" name="answer[question_`+question+`][]" id="answer[question_`+question+`][]">
                        </div>
                    </div>
                    <div style="margin-top: 10px" class="box-option-answer">
                        <div style="display: inline-block;"><span><i class="ti-control-record"></i></span></div>
                        <div style="height: 25px;display: inline-block; width: 85%; margin-left: 10px; color: #0033FF">
                            <span class="add-option-answer">Thêm tùy chọn</span>
                        </div>
                    </div>
                </div>
            </div>
        `);
    })

    $('#submitTest').click(function(e){
        var num_question = $('input[name^="question"]').length;
        $('#formCreateTest').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "name": {
                    required: true,
                },
                "time" : {
                    required : true,
                },

            }
        });

        $(document).on('submit', '#formCreateTest', function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: data,
                dataType: 'json'
            })
            .done(function (data) {
                if (data.success) {
                    window.onbeforeunload = null;
                    $(window).attr('location', data.redirect);
                }
            })
            .fail(function (data) {
                var errors = JSON.parse(data.responseText).errors;

                if (errors.name) {
                    $('#name-test').css('border-color', 'red');
                    $('.name-messages').text(errors.name);
                    $('.name-messages').css({'color' : 'red', 'font-size' : '14px'});
                }
            });
        })

        for (var i = 1; i <= num_question; i++) {
            addValidationRuleForQuestion(i);
        }
    });

    $.validator.addMethod('questionunique', function (value, element) {
        var parentForm = $(element).closest('form');
        var timeRepeated = 0;

        if (value.trim()) {
            $(parentForm.find($('input[name^="question["]'))).each(function () {
                if ($(this).val() === value) {
                    timeRepeated++;
                }
            });
        }

        return timeRepeated === 1 || timeRepeated === 0;

    }, Lang.get('validation.msg.duplicate_question_title'));

    $.validator.addMethod('answerunique', function (value, element) {
        var parentForm = $(element).parent().parent().parent();
        var timeRepeated = 0;

        if (value.trim()) {
            $(parentForm.find($('input[name^="answer[question_"]'))).each(function () {
                if ($(this).val() === value) {
                    timeRepeated++;
                }
            });
        }

        return timeRepeated === 1 || timeRepeated === 0;

    }, Lang.get('validation.msg.duplicate_answer_title'));

    function addValidationRuleForQuestion(value) {
        $(`#box_show_question_${value} input[name^="question"]`).each(function () {
            $(this).rules('add', {
                required: true,
                maxlength: 255,
                questionunique: false,
            });
        });
    }

    function addValidationRuleForAnswer(value) {
    $(`#answer[question_${value}] input[name^="anwser"]`).each(function () {
        $(this).rules('add', {
            required: true,
            answerunique: true,
        });
    });
    }

    $.extend($.validator.messages, {
        required: Lang.get('validation.msg.required'),
    } );

    $(document).on('click', '.check', function () {
        if ($(this).is(':checked')) {
           var element = $(this).closest('div.element-questions').find($('input[name^="answer[question_"]'));
           var oldVal = element.val();
           $(this).val(oldVal)
        } else {
             $(this).val('');
        }

    })

    $('input').click(function () {
        $(this).parent().find('.error').text('');
        $(this).parent().find('.error').css('margin', '0px');
    });

});
