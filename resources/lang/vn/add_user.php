<?php
return [
    'title' => 'Thêm người dùng',
    'name' => 'Họ và tên',
    'password' => 'Mật khẩu',
    'email' => 'Email',
    'coin_number' => 'Coin number',
    'role' => 'Cấp bậc',
    'avatar' => 'Hình đại diện',
    'roles' => [
        1 => 'Admin',
        2 => 'User',
        3 => 'Teacher'
    ],
    'validation' => [
        'name' => [
            'required' => 'Họ tên không được để trống'
        ],
        'email' => [
            'required' => 'Email không được để trống',
            'email' => 'Nhập không đúng định dạng email',
            'unique' => 'Email đã tồn tại trong hệ thống, vùi lòng nhập email khác'
        ],
        'password' => [
            'required' => 'Mật khẩu không được để trống',
            'min' => 'Bạn nhập phải lớn hơn :attribute kí tự'
        ],
    ]
];
