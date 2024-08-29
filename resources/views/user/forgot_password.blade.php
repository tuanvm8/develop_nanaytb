@extends('user.main')
@section('templateContent')
<main class="mb-5">

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-5 col-sm-12 br-login"
            style="background-image: url('images/image-login.png')">

        </div>
        <div class="col-lg-6 col-md-7 col-sm-2">
            <div class="box-login">
                <div class="heading_s1">
                    <h1 class="title" style="margin-top: 80px;">Quên mật khẩu</h1>
                </div>
                <form method="POST" action="#" class="mt-50" id="form-dangnhap">
                    <input type="hidden" value="799e879e227ea4deccaf031bf8148aadfe019455" name="_token" />
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="text" class=" form-control" required="" name="email"
                            placeholder="Nhập email đăng ký">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-main" name="quenpass">Xác nhận đổi mật
                            khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#form-dangnhap").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Vui lòng nhập email",
                    email: "Vui lòng nhập đúng định dạng mail"
                }
            }
        });
        $("#form-quenpass").validate({
            rules: {
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