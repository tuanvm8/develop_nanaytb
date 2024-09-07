@extends('user.main')
@section('templateContent')
    <main class="mb-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 col-sm-2">
                    <div class="box-login" style="box-shadow: 1px 1px 10px 1px #cccc;border-radius: 30px;">
                        <div class="row d-flex justify-content-center align-items-center pb-4 pt-2">
                            <div class=" col-lg-4 col-md-4 col-4  d-flex justify-content-center align-items-center pl-2 "
                                style="padding-left: 20px;">
                                <img class="rounded-circle img-fluid p-2 " src="{{ asset('asset/images/image-login.png') }}"
                                    alt="" style="border: 1px solid #0dcaf0; " />
                            </div>
                            <div class=" col-lg-8 col-md-8 col-8">
                                <p class="form-label">{{ Auth::user()->username }}</p>
                                <p class="form-label" style="font-weight: 400;">{{ Auth::user()->email }}</p>
                                <p class="form-label" style="color: red;">Số dư: <span class="user_point formattedNumber"
                                        style="color: red;">{{ Auth::user()->point }}</span></p>
                            </div>
                        </div>
                        <h1 class="title">RÚT TIỀN</h1>
                        <form method="post" action="{{ route('withdraw_money.post') }}" id="form-ruttien">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Số tiền</label>
                                <input type="text" class="form-control" required="" name="point"
                                    placeholder="Nhập số tiền muốn rút" value="{{ old('point') ?? Auth::user()->point }}">
                                <p class="help is-danger text-danger ">{{ $errors->first('point') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số tài khoản</label>
                                <input type="text" class="form-control" required="" name="account_number"
                                    placeholder="Nhập số tài khoản" value="{{ old('account_number') }}">
                                <p class="help is-danger text-danger ">
                                    {{ $errors->first('account_number') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngân hàng</label>
                                <input type="text" class="form-control" required="" name="name_bank"
                                    placeholder="Nhập tên ngân hàng" value="{{ old('name_bank') }}">
                                <p class="help is-danger text-danger ">{{ $errors->first('name_bank') }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chi nhánh</label>
                                <input type="text" class="form-control" required="" name="branch"
                                    placeholder="Nhập tên chi nhánh" value="{{ old('branch') }}">
                                <p class="help is-danger text-danger ">{{ $errors->first('branch') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Người giới thiệu</label>
                                <input type="text" class="form-control" name="introducee"
                                    placeholder="Nhập thông tin người giới thiệu" value="{{ old('introducee') }}">
                                <p class="help is-danger text-danger ">{{ $errors->first('introducee') }}</p>
                            </div>
                            <p class="help is-danger text-danger ">{{ $errors->first('msg') }}</p>
                            @if (Auth::check() && Auth::user()->point >= 200000)
                                <div class="mb-3 text-center ">
                                    <button type="submit" class="btn btn-main">YÊU CẦU RÚT TIỀN</button>
                                </div>
                            @else
                                <p class="help is-danger text-danger ">Tài khoản chưa đủ mức để được rút
                                    tiền</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
                $("#form-ruttien").validate({
                    rules: {
                        point: "required",
                        account_number: "required",
                        name_bank: "required",
                        branch: "required",
                    },
                    messages: {
                        point: "Số tiền không được để trống",
                        account_number: "Số tài khoản không được để trống",
                        name_bank: "Tên ngân hàng không được để trống",
                        branch: "Chi nhánh không được để trống",
                    }
                });
            });
        </script>
    </main>
@endsection
