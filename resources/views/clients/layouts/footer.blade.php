    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>@lang('lang.introduce')</h4>
                    <p>@lang('lang.introduce_body')</p>
                </div>
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>@lang('lang.communications')</h4>
                    <p>@lang('lang.communications_body')</p>
                    <p>@lang('lang.email') : {{ config('settings.email') }}</p>
                    <p>@lang('lang.phone') : {{ config('settings.phone') }}</p>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter"></i></a>
                    <a href="#"><i class="ti-dribbble"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
        <script src="{{ asset('js/clients/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/clients/popper.js') }}"></script>
        <script src="{{ asset('js/clients/bootstrap.min.js')}}"></script>
        {{-- <script src="{{ asset('js/clients/jquery.nice-select.min.js')}}"></script> --}}
        <script src="{{ asset('js/clients/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/clients/owl-carousel-thumb.min.js')}}"></script>
        <script src="{{ asset('js/clients/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{ asset('js/clients/mail-script.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('js/clients/gmaps.min.js')}}"></script>
        <script src="{{ asset('js/clients/theme.js')}}"></script>
        <script src="{{ asset('js/clients/jquery.sticky-kit.min.js')}}"></script>
        <script src="{{ asset('messages.js')}}"></script>
        <script src="{{ asset('js/clients/auth.js')}}"></script>
        <script src="{{ asset('js/clients/main.js')}}"></script>
        <script src="{{ asset('js/clients/dataTable.js')}}"></script>
        <script src="{{ asset('js/clients/pusher.min.js')}}"></script>
        @yield('js')
    </body>
    <script type="text/javascript">
        var user = $('#user-id').val();
        Pusher.logToConsole = true;
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            forceTLS: true
        });
        var channel = pusher.subscribe('send-comment');
        channel.bind('NotifyComment', function(data) {

            if (user == data.userId) {
                var text = '@lang('comment.comment')';

                if (data.parentId != 0) {
                    text = '@lang('comment.reply_comment')'
                }

                $('#count').text(data.count);
                $('#count').addClass('num');
                $('.show-notifications').prepend(`
                    <li>
                         <a href="/update-notification/` + data.notificationId + `" style="background-color: #cceb514a"><span style="color: blue">` + data.content + `</span> ` + text +`
                         </a>
                    </li>
                `);
                $('.notifications-empty').css('display', 'none');
            }
        });
    </script>
</html>
