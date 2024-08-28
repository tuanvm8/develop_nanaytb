@extends('user.main')
@section('pageTitle', 'Trang chủ')
@section('templateContent')
    @include('user.slider', ['sliders' => $sliders])
    <div class="container">
        <!-- Dòng sản phẩm chính -->
        <div class="my-5">
            <h1 class="ps-2 text-dark-blue fw-semibold fs-2 text-uppercase border-title mb-3">DÒNG SẢN PHẨM CHÍNH</h1>
            <div class="row mb-4">
                @foreach ($mainContent as $index => $main)
                    <div class="col-sm-4 mb-3 main-content">
                        <a href="{{ route('product.list', ['categorySlug' => $main->slug]) }}" class="">
                            <div class="h-100 position-relative border-0 shadow rounded-4 overflow-hidden">
                                <img src="{{ $main->image ?? asset('asset/images/Logo-shortcut.png') }}"
                                    class="w-100 h-100 border-0 rounded-4 main-content-image" alt="">
                                <div
                                    class="position-absolute top-50 start-50 translate-middle text-white text-center bg-dark w-100 h-100 border-0 rounded-4 opacity-50">
                                </div>
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-75">
                                    <h2 class="text-decoration-none text-white fw-bolder">{{ $main->name }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mb-5">
            <h1 class="ps-2 text-dark-blue fw-semibold fs-2 text-uppercase border-title mb-5">Con số ấn tượng</h1>
            <div class="counter_wrapper text-center w-100">
                <div class="row">
                    <div class="col-md-3 col-sm-3 mb-5">
                        <div class="count_box st-box py-5 h-100">
                            <h1 class="text-danger fw-bolder fs-1"><span class="timer">300</span>+</h1>
                            <h4 class="fs-3 text-uppercase fw-bolder pt-4">Nhà cung cấp trên toàn cầu</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mb-5">
                        <div class="count_box py-5 nd-box h-100 box_center">
                            <h1 class="text-danger fw-bolder fs-1"><span class="timer">10241</span>+</h1>
                            <h4 class="fs-3 text-uppercase fw-bolder pt-4">Sản phẩm & công nghệ tiên tiến</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mb-5">
                        <div class="count_box py-5 rd-box h-100">
                            <h1 class="text-danger fw-bolder fs-1"><span class="timer">2</h1>
                            <h4 class="fs-3 text-uppercase fw-bolder pt-4">Chi nhanh trên toàn quốc</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mb-5">
                        <div class="count_box py-5 th-box h-100">
                            <h1 class="text-danger fw-bolder fs-1"><span class="timer">100</span>+</h1>
                            <h4 class="fs-3 text-uppercase fw-bolder pt-4">Nhà phân phối & đại lý tại 63 tỉnh
                                thành</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 bg-white py-5">
        <div class="container">
            <h1 class="ps-2 text-dark-blue fw-semibold fs-2 text-uppercase border-title mb-1">Khách hàng nói gì về
                chúng tôi</h1>
            <div class="mt-4">
                <div class="row mb-3">
                    <div class="col-4 d-flex align-items-center">
                        <img src="{{ asset('asset/images/pcc-1.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="col-8 d-flex align-items-center text-justify">
                        <span>
                            Chúng tôi là đối tác lâu năm của Datyso, đã hợp tác chặt chẽ cùng với Datyso trong
                            việc ứng dụng công nghệ tiên tiến vào hoạt động sản xuất kinh doanh, đặc biệt là
                            trong lĩnh vực hàn cắt và gia công kim loại. Với những cải tiến đó, năng suất lao
                            động của chúng tôi được nâng lên rất nhiều, ảnh hưởng rất tích cực đến hiệu quả kinh
                            doanh. Qua thời gian hợp tác, chúng tôi rất hài lòng về chất lượng cũng như dịch vụ
                            mà Datyso cung cấp. Chắc chắn rằng PCC-1 sẽ còn hợp tác với Datyso trong thời gian
                            sắp tới.

                            <div class="text-danger text-end">
                                <p class="mb-0 fw-bolder">Đại diện khách hàng</p>
                                <span class="fst-italic">Tập đoàn xây lắp 1 PCC-1</span>
                            </div>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-8 d-flex align-items-center text-justify">
                        <span>
                            Hiện nay, toàn bộ máy móc trong nhà máy của chúng tôi đều là máy Jasic, cùng hầu hết
                            các loại phụ kiện hàn cắt do Datyso cung cấp. Chúng tôi rất hài lòng về chất lượng
                            sản phẩm cũng như dịch vụ của Datyso. Thiên Trường và Datyso sẽ luôn là người bạn
                            đồng hành trên bước đường phát triển.

                            <div class="text-danger">
                                <p class="mb-0 fw-bolder">Ông Trần Đình Tân</p>
                                <span class="fst-italic">Giám đốc công ty TNHH SX & TM Thiên Trường</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <img src="{{ asset('asset/images/thien-truong.png') }}" class="w-100" alt="">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-4 d-flex align-items-center">
                        <img src="{{ asset('asset/images/ameco.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-8 d-flex align-items-center text-justify">
                        <span>
                            Các sản phẩm mà Datyso cung cấp cho chúng tôi như: Dây chuyền khoan cưa,
                            dây chuyền gia công thép tấm, máy hàn TIG, MIG…vận hành rất tốt giúp cho
                            anh em kỹ thuật đỡ vất vả hơn, làm việc hiệu quả hơn, năng suất lao
                            động và giá trị mang lại cao. Các kỹ sư lắp đặt Datyso cũng đã rất
                            nhiệt tình khi cố gắng hoàn thành tốt tiến độ để chúng tôi có thể
                            tiến hành công việc tiếp theo. Datyso sẽ là đối tác tin cậy, dài lâu
                            của AMEEC trên chặng đường tương lai

                            <div class="text-danger text-end">
                                <p class="mb-0 fw-bolder">Ông Nguyễn Văn Thọ</p>
                                <span class="fst-italic">TGĐ Công ty CP CKXD AMECC</span>
                            </div>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-8 d-flex align-items-center text-justify">
                        <span>
                            Công ty Cổ Phần Kết cấu thép CPT chúng tôi rất hài lòng với tiến độ
                            lắp đặt và chất lượng dịch vụ của Datyso cung cấp và đặc biệt đánh
                            giá cao tinh thần và thái độ làm việc của đội ngũ cán bộ kỹ thuật thi
                            công lắp đặt Datyso
                            <div class="text-danger">
                                <p class="mb-0 fw-bolder">Ông Lê Viết Hiệu</p>
                                <span class="fst-italic">Giám đốc nhà máy CPT</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <img src="{{ asset('asset/images/steel.png') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{-- Tin tức --}}
        <div class="mb-5">
            <h1 class="ps-2 text-dark-blue fw-semibold fs-2 text-uppercase border-title mb-3">TIN TỨC</h1>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-4 mb-2">
                        <div class="card border-0 rounded-4 bg-transparent h-100">
                            <img src="{{ $post->image }}" class="card-img-top rounded-4 w-100 shadow"
                                alt="{{ $post->name }}" style="max-height: 12em">
                            <div class="card-body py-2 px-0 d-flex flex-column">
                                <small class="fw-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.9em" height="0.9em"
                                        fill="currentColor" class="bi bi-calendar mb-1" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                    </svg>
                                    {{ date_format($post->updated_at, 'd/m/Y') }}
                                </small>
                                <p class="mb-0 fw-semibold mb-1"><a href="{{ route('post.detail', ['postSlug' => $post->slug]) }}"
                                        class="text-decoration-none text-black">{{ $post->name }}</a></p>
                                <a href="{{ route('post.detail', ['postSlug' => $post->slug]) }}"
                                    class="mt-auto text-decoration-none fw-medium fst-italic text-dark-blue"><small>Xem chi
                                        tiết</small></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Địa chỉ -->
        <div class="mb-5">
            <h1 class="ps-2 text-dark-blue fw-semibold fs-2 text-uppercase border-title mb-3">TÌM ĐỊA CHỈ CHI NHÁNH</h1>
            <div class="row">
                <div class="col-sm-6">
                    @foreach ($address as $index => $addressInfo)
                        <div class="bg-white border border-0 rounded-4 shadow-sm p-3">
                            <h6><span class="fw-bolder">CỬA HÀNG KHU VỰC:</span>
                                {{ $addressInfo ? $addressInfo->name : '' }}</h6>
                            <p class="mb-0"><span class="fw-bolder">Địa chỉ:</span>
                                {{ $addressInfo ? $addressInfo->address : '' }}</p>
                            <p class="mb-0"><span class="fw-bolder">Điện Thoại:</span>
                                {{ $addressInfo ? $addressInfo->phone : '' }}</p>
                            <p class="mb-0"><span class="fw-bolder">Hotline:</span>
                                {{ $addressInfo ? $addressInfo->hotline : '' }}</p>
                            <p class="mb-0"><span class="fw-bolder">Email:</span>
                                {{ $addressInfo ? $addressInfo->email : '' }}</p>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="button" class="find-location-btn border border-1 rounded px-4 py-2" data-map="{{ $index == 1 ? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.5407330127!2d106.36556260773301!3d10.754618131050183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1719844620416!5m2!1svi!2s' : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.988458865322!2d105.81636406156126!3d21.022738359976213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1719844885655!5m2!1svi!2s' }}">TÌM TRÊN BẢN ĐỒ</button>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
                <div class="col-sm-6">
                    <div class="h-100">
                        <div id="maps" class="ps-2 h-100">
                            <iframe id="map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.988458865322!2d105.81636406156126!3d21.022738359976213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1719844443860!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('user.buttonSocial')

    <script>
         document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.find-location-btn');
        const iframe = document.getElementById('map-iframe');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const mapSrc = this.getAttribute('data-map');
                if (mapSrc) {
                    iframe.src = mapSrc;
                }
            });
        });
    });
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 25,
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
        });

        var mySwiperNews = new Swiper('.mySwiperNews', {
            loop: true,
            spaceBetween: 25,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        $(document).ready(function() {
            $('.text-news').each(function() {
                var maxLength = 180;
                var text = $(this).text();
                if (text.length > maxLength) {
                    var truncatedText = text.substring(0, maxLength) + '...';
                    $(this).text(truncatedText);
                }
            });
        });

        const animationDuration = 3000;

        const frameDuration = 1000 / 60;

        const totalFrames = Math.round(animationDuration / frameDuration);

        const easeOutQuad = t => t * (2 - t);

        const animateCountUp = el => {
            let frame = 0;
            const countTo = parseInt(el.innerHTML, 10);

            const counter = setInterval(() => {
                frame++;

                const progress = easeOutQuad(frame / totalFrames);

                const currentCount = Math.round(countTo * progress);


                if (parseInt(el.innerHTML, 10) !== currentCount) {
                    el.innerHTML = currentCount;
                }

                if (frame === totalFrames) {
                    clearInterval(counter);
                }
            }, frameDuration);
        };

        const countupEls = document.querySelectorAll('.timer');
        countupEls.forEach(animateCountUp);
    </script>

    <script src="{{ asset('asset/js/home.js') }}"></script>
@endsection
