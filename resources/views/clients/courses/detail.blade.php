@section('title', 'details')
@include('clients.layouts.header')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/banner.jpg'), '', ['class' => 'img_banner_course_detail']) }}
    </section>
    <div class="container">
            <div class="row">
                <div class="col-lg-8 course-detail">
                    <div class="content_wrapper">
                        <h3 class="title">Khóa học Javascript</h3>
                        <div class="content">
                            Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước để làm quen với tư duy, cách hoạt động của máy tính. Thứ tự học làm web đã trở nên lỗi thời là: HTML/CSS/JS. Thứ tự mới sẽ là: JS/HTML/CSS. Ngoài ra, nếu bạn đang làm web developer, nên xem lại để củng cố kiến thức, JavaScript là một ngôn ngữ dễ học nhưng khó làm chủ.
                        </div>
                        <hr>
                        <h3 class="title">@lang('lang.course_outline')</h3>
                        <div class="content">
                            <ul class="course_list">
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Chuẩn bị đồ nghề</p>
                                    <p class="description_course_details">Các biểu thức toán học trong JavaScript</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Thuật ngữ (terms) là gì?</p>
                                    <p class="description_course_details">Giải thích về ý nghĩa của thuật ngữ và giới thiệu các thuật ngữ trong lập trình</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Khoá học lập trình miễn phí có gì hay?</p>
                                    <p class="description_course_details">Tổng quan nội dung của khoá học từ front-end, back-end và các chuyên môn khác</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Biến trong JavaScript</p>
                                    <p class="description_course_details">Giới thiệu về chung về máy tính và biến trong JavaScript</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details"> Kiểu dữ liệu (Phần 1) dasdasdsds</p>
                                    <p class="description_course_details">Giới thiệu về các kiểu dữ liệu cơ bản trong JavaScript</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Object trong JavaScript</p>
                                    <p class="description_course_details">Tìm hiểu về Object và ứng dụng trong thực tế</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Array trong JavaScript</p>
                                    <p class="description_course_details">Tìm hiểu về Array và cách sử dụng, sự khác biệt giữa Array và Object</p>

                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Arithmetic Operators</p>
                                    <p class="description_course_details">Các biểu thức toán học trong JavaScript</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">Phép tính tăng, giảm (++, --)</p>
                                    <p class="description_course_details">Các phép tính tăng giảm, phân biệt cách sử dụng</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <div class="justify-content-between d-flex">
                                <p>Thể loại</p>
                                <span>Video</span>
                            </div>
                        </li>
                        <li>
                            <div class="justify-content-between d-flex">
                                <p>Gía</p>
                                <span>100 Xu</span>
                            </div>
                        </li>
                        <li>
                            <div class="justify-content-between d-flex">
                                <p>Số người đã đăng ký</p>
                                <span>15</span>
                            </div>
                        </li>
                        <li>
                            <div class="justify-content-between d-flex">
                                <p>Ngày đăng</p>
                                <span>15/10/2019</span>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="primary-btn2 text-uppercase enroll rounded-0 text-white">Đăng ký</a>
                </div>
            </div>
        </div>
@include('clients.layouts.footer')
