@extends('user.main')
@section('pageTitle', 'Trang chủ')
@section('templateContent')
    <main class="mb-5">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="title_home"> <span>Video hôm nay</span></h2>
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="item_video">
                                    <a href="{{ route('watch_videos', ['id' => $item->id]) }}" class="box_video">
                                        <i class="fa-brands fa-youtube position-absolute top-50 start-50 translate-middle"></i>
                                        <img style="width:100%; height: 225px;" src="{{ $item->image }}" alt="Firebase Image" />
                                    </a>
                                    <h3>
                                        <a href="{{ route('watch_videos', ['id' => $item->id]) }}"
                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box-login" style="padding: 0;">
                        <h1 class="title" style="margin-top: 50px;">Thành viên đăng nhập</h1>
                        @if (!Auth::check())
                            <form method="POST" action="{{ route('login.post') }}" id="form-dangnhap">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" required="" name="email" class=" form-control"
                                        placeholder="Nhập email" value="{{ old('email') ?? $errors->first('email') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Mật khẩu</label>
                                    <input required="" type="password" class=" form-control" name="password"
                                        placeholder="Nhập mật khẩu"
                                        value="{{ old('password') ?? $errors->first('password') }}">
                                </div>
                                <div class="mb-4 d-flex justify-content-between">
                                    <div class="chek-form ">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="save"
                                                id="exampleCheckbox1" value="1">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Ghi nhớ đăng
                                                    nhập</span></label>
                                        </div>
                                    </div>
                                    <a href="{{ route('resetPassword.create') }}">Quên mật khẩu?</a>
                                </div>
                                <p class="help is-danger text-danger confirm_password">{{ $errors->first('msg') }}</p>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-main" name="login" value="1">Đăng nhập</button>
                                </div>
                            </form>
                        @endif


                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <img class="img_gioithieu" src="asset/images/avata/DFCC1B02-2C31-4864-AB9C-C1256E9ABA02.jpg"
                                alt="Kiếm tiền khi tham gia cùng  kiemtienyoutube.com " />
                        </div>
                        <div class="col-md-12">
                            <!--h1 class="gioithieu_title">Kiếm tiền khi tham gia cùng  kiemtienyoutube.com </h1-->
                            <div class="gioithieu_des">
                                <p>Nhận điểm thưởng hằng ng&agrave;y khi xem video v&agrave; nhận ngay kho kiến thức khi
                                    đăng k&yacute; t&agrave;i khoản trị gi&aacute; rất cao từ Bậc thầy Phan Anh.</p>

                                <p>Đến với KIEMTIENYOUTUBE.COM&nbsp; bạn được Bật M&iacute; c&aacute;ch kiếm tiền bằng
                                    k&ecirc;nh Youtube, Tik Tok, kiếm tiền tr&ecirc;n c&aacute;c nền tưởng thương mại điện
                                    tử như Shopee, Lazada&hellip;</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="templates/js/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
                $("#form-dangnhap").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: "Vui lòng nhập email",
                            email: "Vui lòng nhập đúng định dạng mail"
                        },
                        password: {
                            required: "Vui lòng nhập mật khẩu"
                        }
                    }
                });
                // $("#form-dangnhap").on('submit', function(event) {
                //     event.preventDefault(); // Ngăn chặn hành động submit mặc định

                //     $.ajax({
                //         url: $(this).attr('action'),
                //         method: 'POST',
                //         data: $(this).serialize(),
                //         success: function(response) {
                //             // Xử lý khi đăng nhập thành công
                //             location.reload(); // Tải lại trang
                //         },
                //         error: function(xhr) {
                //             // Xử lý khi có lỗi
                //             alert('Đăng nhập không thành công. Vui lòng thử lại.');
                //         }
                //     });
                // });
            });
        </script>
    </main>
@endsection
