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
                    <h1 class="title" style="margin-top: 50px;">Thành viên đăng nhập</h1>
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
                                placeholder="Nhập mật khẩu" value="{{ old('password') ?? $errors->first('password') }}">
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
                            <a href="{{ route('forgot_password') }}">Quên mật khẩu?</a>
                        </div>
                        <p class="help is-danger text-danger confirm_password">{{ $errors->first('msg') }}</p>

                        <div class="text-center">
                            <button type="submit" class="btn btn-main" name="login" value="3">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        });
    </script>
</main>

@endsection