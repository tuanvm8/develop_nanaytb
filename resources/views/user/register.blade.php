@extends('user.main')
@section('templateContent')
<main class="mb-5">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-2">
                <div class="box-login" style="box-shadow: 1px 1px 10px 1px #cccc;border-radius: 30px;">
                    <div class=" text-center">
                        <img src="{{ asset('images/image-login.png') }}" alt=""
                            style="height: 180px;object-fit: contain;margin-bottom: 30px;" />
                    </div>
                    <h1 class="title">Đăng ký tài khoản</h1>
                    <p class="des">Thông tin đăng ký sẽ được xác nhận trước khi hoạt động</p>
                    <form method="post" action="{{ route('register.post') }}" id="form-dangky">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" required="" name="ho_ten"
                                placeholder="Nhập họ tên" value="{{ old('ho_ten') }}">
                            <p class="help is-danger text-danger confirm_password">{{ $errors->first('ho_ten') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" required="" name="email"
                                placeholder="Nhập email" value="{{ old('email') }}">
                            <p class="help is-danger text-danger confirm_password">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Điện thoại</label>
                            <input type="text" class="form-control" required="" name="dien_thoai"
                                placeholder="Nhập số điện thoại" value="{{ old('dien_thoai') }}">
                            <p class="help is-danger text-danger confirm_password">{{ $errors->first('dien_thoai') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input required="" class="form-control" type="password" id="matkhau" name="mat_khau"
                                placeholder="Nhập mật khẩu" value="{{ old('mat_khau') }}">
                            <p class="help is-danger text-danger confirm_password">{{ $errors->first('mat_khau') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu</label>
                            <input required="" class="form-control" type="password" name="mat_khau2"
                                placeholder="Nhập lại mật khẩu" value="{{ old('mat_khau2') }}">
                            <p class="help is-danger text-danger confirm_password">{{ $errors->first('mat_khau2') }}</p>
                        </div>
                        <p class="help is-danger text-danger confirm_password">{{ $errors->first('msg') }}</p>
                        <div class="mb-3 text-center ">
                            <button type="submit" class="btn btn-main">Đăng ký</button>
                        </div>
                        <p class="font-xs text-muted text-center">Đã đăng ký tài khoản trước đó <a
                                href="{{ route('login.index') }}">Đăng nhập</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#form-dangky").validate({
                rules: {
                    ho_ten: "required",
                    xacnhan: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    mat_khau: {
                        required: true,
                        minlength: 6,
                    },
                    mat_khau2: {
                        required: true,
                        minlength: 6,
                        equalTo: "#matkhau"
                    }
                },
                messages: {
                    ho_ten: "Vui lòng nhập họ tên",
                    xacnhan: "Vui lòng xác nhận đồng ý với các điều khoản",
                    email: {
                        required: "Vui lòng nhập email",
                        email: "Vui lòng nhập đúng định dạng mail"
                    },
                    mat_khau: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: 'Mật khẩu tối thiểu 6 ký tự'
                    },
                    mat_khau2: {
                        required: 'Vui lòng xác nhận lại mật khẩu',
                        minlength: 'Mật khẩu tối thiểu 6 ký tự',
                        equalTo: "Nhập lại mật khẩu không đúng"
                    }
                }
            });
        });
    </script>
</main>

@endsection