@extends('user.main')
@section('templateContent')
    <div class="bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-capitalize fw-bolder m-0 py-3 fs-5">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- MAIN BODY -->
    <div class="w-100">
        <img src="{{ asset('asset/images/bg-contact.webp') }}" class="w-100 position-relative" alt="">
    </div>
    <main class="bg-light p-5">
        <div class="container">
            <div class="text-center contact-title mb-5 text-uppercase fw-bold fs-1">Liên Hệ Với Chúng Tôi Để Được Tư Vấn Miễn Phí
            </div>
            @include('admin.core.alert')
            <div class="row shadow border border-0">
                <div class="col-sm-5 p-5 contact-bg" style="background-color: #002ab0;">
                    <div class="text-light px-5">
                        <div class="mb-5">
                            <img src="{{ asset('asset/images/logo-white.jfif') }}" class="w-100" alt="">
                        </div>
                        <div class="text-uppercase fs-5 fw-bold mb-2">Công Ty Cổ Phần Datyso Việt Nam</div>
                        <div class="mb-2 d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                            <div class="mx-2"></div>
                            <div>
                                <span>Datysojsc@gmail.com</span>
                            </div>
                        </div>
                        <div class="mb-2 d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor"
                                    class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </div>
                            <div class="mx-2"></div>
                            <div>
                                <span>0906.561.288</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 bg-white p-5">
                    <div class="contact">
                        <form action="{{ route('contact.register') }}" method="post">
                            @csrf
                            <div class="my-3">
                                <div class="mb-4">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control rounded-0 username" name="username"
                                            id="username" placeholder="Họ và tên(*)" value="">
                                    </div>
                                    <p class="help is-danger text-danger username">{{ $errors->first('username') }}</p>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group mb-2">
                                        <input type="email" class="form-control rounded-0 email" name="email"
                                            id="email" placeholder="Địa chỉ email(*)" value="">
                                    </div>
                                    <p class="help is-danger text-danger email">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control rounded-0" name="phone" id="phone"
                                            placeholder="Số điện thoại(*)">
                                    </div>
                                    <p class="help is-danger text-danger phone">{{ $errors->first('phone') }}</p>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-2">
                                        <textarea class="form-control rounded-0" name="content" id="content" placeholder="Tin nhắn"></textarea>
                                    </div>
                                    <p class="help is-danger text-danger content">{{ $errors->first('content') }}</p>
                                </div>
                                @if ($product)
                                    <div class="mb-4">
                                        <label for="">Sản phẩm</label>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div>
                                            <a target="_blank" href="{{ route('product.detail', ['categorySlug' => $product->categories()->first()->slug, 'productSlug' => $product->slug]) }}">{{ $product->name }}</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-submit btn-primary px-3 py-2 rounded-0 mb-4 fw-bolder text-uppercase">Gửi
                                    tin nhắn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('footer')
@endsection
