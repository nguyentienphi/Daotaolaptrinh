<?php

return [
    'title' => 'Thêm Khoá Học',
    'name' => 'Tên Khoá Học',
    'title_course' => 'Tiêu Đề',
    'description' => 'Chú thích',
    'image' => 'Hình ảnh',
    'price' => 'Giá',
    'category' => 'Danh Mục Khoá Học',
    'user' => 'Người Quản Lý',
    'button' => 'Thêm',
    'validation' => [
        'name' => [
            'required' => 'Tên khoá học không được để trống'
        ],
        'title' => [
            'required' => 'Tiêu đề không được để trống'
        ],
        'description' => [
            'required' => 'Chú thích không được để trống'
        ],
        'category' => [
            'required' => 'Loại khoá học không được để trống'
        ],
        'user' => [
            'required' => 'Người quản lý không được để trống'
        ],
        'picture' => [
            'required' => 'Hình ảnh không được để trống'
        ],
        'price' => [
            'required' => 'Giá không được để trống'
        ]
    ]
];
