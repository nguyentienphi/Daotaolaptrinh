<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => 'Trường :attribute phải được chấp nhận.',
    'active_url' => 'Trường :attribute không phải là một URL hợp lệ.',
    'after' => 'Trường :attribute phải là một ngày sau ngày :date và sau thời gian bắt đầu.',
    'alpha' => 'Trường :attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => 'Trường :attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num' => 'Trường :attribute chỉ có thể chứa chữ cái và số.',
    'array' => 'Kiểu dữ liệu của trường :attribute phải là dạng mảng.',
    'before' => 'Trường :attribute phải là một ngày trước ngày :date.',
    'between' => [
        'numeric' => 'Trường :attribute phải nằm trong khoảng :min - :max.',
        'file' => 'Dung lượng tập tin trong trường :attribute phải từ :min - :max kB.',
        'string' => 'Trường :attribute phải từ :min - :max ký tự.',
        'array' => 'Trường :attribute phải có từ :min - :max phần tử.',
    ],
    'boolean' => 'Trường :attribute phải là true hoặc false.',
    'confirmed' => 'Giá trị xác nhận trong trường :attribute không khớp.',
    'date' => 'Trường :attribute không phải là định dạng của ngày-tháng.',
    'date_format' => 'Trường :attribute không giống với định dạng :format.',
    'different' => 'Trường :attribute và :other phải khác nhau.',
    'digits' => 'Độ dài của trường :attribute phải gồm :digits chữ số.',
    'digits_between' => 'Độ dài của trường :attribute phải nằm trong khoảng :min and :max chữ số.',
    'dimensions' => 'Trường :attribute có kích thước không hợp lệ.',
    'distinct' => 'Trường :attribute có giá trị trùng lặp.',
    'email' => 'Trường :attribute phải là một địa chỉ email hợp lệ.',
    'exists' => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'file' => 'Trường :attribute phải là một tệp tin.',
    'filled' => 'Trường :attribute không được bỏ trống.',
    'image' => 'Trường :attribute phải là định dạng hình ảnh.',
    'in' => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'in_array' => 'Trường :attribute phải thuộc tập cho phép: :other.',
    'integer' => 'Trường :attribute phải là một số nguyên.',
    'ip' => 'Trường :attribute phải là một địa chỉ IP.',
    'json' => 'Trường :attribute phải là một chuỗi JSON.',
    'max' => [
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'file' => 'Dung lượng tập tin trong trường :attribute không được lớn hơn :max kB.',
        'string' => 'Trường :attribute không được lớn hơn :max ký tự.',
        'array' => 'Trường :attribute không được lớn hơn :max phần tử.',
    ],
    'mimes' => 'Trường :attribute phải là một tập tin có định dạng: :values.',
    'mimetypes' => 'Trường :attribute phải là một tập tin có định dạng: :values.',
    'min' => [
        'numeric' => 'Trường :attribute phải tối thiểu là :min.',
        'file' => 'Dung lượng tập tin trong trường :attribute phải tối thiểu :min kB.',
        'string' => 'Trường :attribute phải có tối thiểu :min ký tự.',
        'array' => 'Trường :attribute phải có tối thiểu :min phần tử.',
    ],
    'not_in' => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'numeric' => 'Trường :attribute phải là một số.',
    'present' => 'Trường :attribute phải được cung cấp.',
    'regex' => 'Định dạng trường :attribute không hợp lệ.',
    'required' => 'Trường :attribute không được bỏ trống.',
    'required_if' => 'Trường :attribute không được bỏ trống khi trường :other là :value.',
    'required_unless' => 'Trường :attribute không được bỏ trống trừ khi :other là :values.',
    'required_with' => 'Trường :attribute không được bỏ trống khi một trong :values có giá trị.',
    'required_with_all' => 'Trường :attribute không được bỏ trống khi tất cả :values có giá trị.',
    'required_without' => 'Trường :attribute không được bỏ trống khi một trong :values không có giá trị.',
    'required_without_all' => 'Trường :attribute không được bỏ trống khi tất cả :values không có giá trị.',
    'same' => 'Trường :attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => 'Trường :attribute phải bằng :size.',
        'file' => 'Dung lượng tập tin trong trường :attribute phải bằng :size kB.',
        'string' => 'Trường :attribute phải chứa :size ký tự.',
        'array' => 'Trường :attribute phải chứa :size phần tử.',
    ],
    'string' => 'Trường :attribute phải là một chuỗi ký tự.',
    'timezone' => 'Trường :attribute phải là một múi giờ hợp lệ.',
    'unique' => 'Trường :attribute đã có trong cơ sở dữ liệu.',
    'uploaded' => 'Trường :attribute tải lên thất bại.',
    'url' => 'Trường :attribute không giống với định dạng một URL.',
    'name' => 'Trường :attribute không được bỏ tróng',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'phone' => 'số điện thoại',
        'name' => 'tên',
        'image' => 'ảnh',
        'birthday' => 'ngày sinh',
        'address' => 'địa chỉ',
        'gender' => 'giới tính',
    ],
    'msg' => [
        'required' => 'Thông tin bắt buộc',
        'remote' => 'Hãy sửa trừờng này.',
        'email' => 'Email không hợp lệ.',
        'url' => 'Url không hợp lệ.',
        'date' => 'Ngày không hợp lệ.',
        'dateISO' => 'Vui lòng nhập ngày hợp lệ (ISO).',
        'number' => 'Số không hợp lệ.',
        'digits' => 'Xin vui lòng chỉ nhập các chữ số.',
        'creditcard' => 'Số thẻ tín dụng không hợp lệ.',
        'equalTo' => 'Vui lòng nhập giá trị tương tự một lần nữa.',
        'maxlength' => 'Hãy nhập không lớn hơn {0} ký tự.',
        'minlength' => 'Hãy nhập ít nhất {0} ký tự.',
        'rangelength' => 'Hãy nhập một giá trị giữa {0} và {1} ký tự.',
        'range' => 'Hãy nhập một giá trị giữa {0} và {1}.',
        'max' => 'Giá trị phải nhỏ hơn hoặc bằng {0}.',
        'min' => 'Giá trị phải hơn hoặc bằng {0}.',
        'invalid_mail' => 'Vui lòng nhập đúng định dạng đuôi email.',
        'file' => 'Tập tin phải có định dạng jpeg|jpg|png||gif|bmp và kích thước nhỏ hơn 2MB',
        'tailmail' => 'Bạn phải nhập tối thiểu một loại email',
        'start_time_after_now' => 'Thời gian bắt đầu khảo sát phải sau thời gian hiện tại.',
        'after_start_time' => 'Thời gian kết thúc khảo sát phải sau thời gian bắt đầu.',
        'more_than_30_minutes' => 'Thời gian kết thúc cuộc khảo sát phải sau thời gian hiện tại ít nhất 30 phút.',
        'duplicate_section_title' => 'Tiêu đề phần đã bị trùng',
        'duplicate_question_title' => 'Đã có một câu hỏi trùng với câu hỏi này',
        'duplicate_answer_title' => 'Đã có một câu trả lời trùng với câu trả lời này',
    ],
    'password_without_spaces_and_require_letter_number_special_character' => 'Mật khẩu không thể bắt đầu hoặc kết thúc bằng khoảng trắng và bắt buộc phải có chữ cái, số, kí tự đặc biệt.',
];
