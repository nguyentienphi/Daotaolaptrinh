@extends('clients.layouts.master')
@section('title', 'Nạp xu')
@section('content')
    <section class="section-list-post-user">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
        @include('clients.profiles.layouts')
    </section>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <h3 style="float: right;">Số xu hiện tại: {{ Auth::user()->coin_number }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <form name="Test"  method="post" action="" onsubmit="return check();">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Họ Tên:</label>
                        </div>
                    <div class="col-md-9">
                        <input  type="text" name="txh_name" size="28" placeholder="Họ tên" / class="form-control">
                    </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Email:</label>
                        </div>
                    <div class="col-md-9">
                        <input  type="text" name="txt_email" size="28" placeholder="Địa chỉ email" class="form-control" />
                    </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Số điện thoại:</label>
                        </div>
                    <div class="col-md-9">
                        <input  type="text" name="txt_phone" size="28" placeholder="Số điện thoại" class="form-control" />
                    </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Số tền thanh toán:</label>
                        </div>
                    <div class="col-md-9">
                        <input name="txt_gia" type="text" size="28" placeholder="Số tiền thanh toán" class="form-control" />
                    </div>

                    </div>
                </div>
                <div class="form-group">
                    <div style="text-align: center;">
                        <input  type="submit" name="submit" value="Thanh Toán" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function check(){
                var price = document.Test.txt_gia.value;

                if (price < 2000) {
                    alert('Số tiền nạp phải lớn hơn 2000');
                    return false;
                }

            return true;
        }
    </script>
@endsection
