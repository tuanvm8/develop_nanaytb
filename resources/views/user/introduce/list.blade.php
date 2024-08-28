@extends('user.main')
@section('templateContent')

@include('user.slider', ['sliders' => $sliders])

<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example bg-white" tabindex="0">
    <div id="section1" class="pt-5 container">
        <div class="text-center text-uppercase mb-2">
            <span class="border-bottom fw-bolder py-2 text-introduce text-dark-blue fs-3">Giới thiệu chung</span>
        </div>
        <div class="row py-4">
            <div class="col-sm-6">
                <div class="text-uppercase text-center fs-3 mb-4">
                    <span class="text-dark-blue text-introduce fw-bold">Công ty cổ phần datyso việt nam</span>
                </div>
                <div class="row">
                    <div class="col-sm-6 introduce-top">
                        <span class="fw-bold">Diện tích</span>
                        <p class="text-dark-blue fs-4 fw-bolder">20.000m</p>
                        <span class="fw-bold">Cơ sở</span>
                        <p class="text-dark-blue fs-4 fw-bolder">2</p>
                        <span class="fw-bold">Nhân sự</span>
                        <p class="text-dark-blue fs-4 fw-bolder">100 +</p>
                    </div>
                    <div class="col-sm-6 introduce-top">
                        <span class="fw-bold">Doanh thu</span>
                        <p class="text-dark-blue fs-4 fw-bolder">1000 tỷ</p>
                        <span class="fw-bold">Sản phẩm</span>
                        <p class="text-dark-blue fs-4 fw-bolder">1000 +</p>
                        <span class="fw-bold">Khách hàng</span>
                        <p class="text-dark-blue fs-4 fw-bolder">1000 +</p>
                    </div>
                </div>
                <div class="text-center button-detail-compaty py-5">
                    <div class="fw-bold mb-2">Hồ sơ Công ty</div>
                    <button type="button" class="btn btn-primary rounded-pill w-50" data-bs-toggle="modal" data-bs-target="#introduce_detail">
                        Xem chi tiết
                    </button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="fs-6 mb-4">
                    <span class="fw-semibold">Kính gửi Quý Khách hàng và Đối tác !</span>
                </div>
                <div class="fs-7">
                    <p><span class="fw-semibold">CÔNG TY CỔ PHẦN DATYSO VIỆT NAM</span> xin gửi lời chào trân trọng nhất tới Quý khách hàng và Đối tác đã tin dùng sản phẩm của công ty trong thời gian qua. Sự hài lòng của quý khách là thành công của chúng tôi.</p>
                    <p>Công ty Cổ phần Datyso Việt Nam (mã số thuế: 0106684335) được thành lập từ năm 2011 tại Hà Nội, với tên gọi ban đầu là Trung tâm Điện máy ĐTS. Nhiệm vụ chính của trung tâm ngay từ thời điểm thành lập là sửa chữa và bảo dưỡng hệ thống máy cơ khí. Nhờ xuất phát điểm vững chắc về kỹ thuật, đến nay, sau 9 năm hình thành và phát triển, Datyso đã không ngừng lớn mạnh và trở thành một trong những đơn vị hàng đầu cung cấp các sản phẩm máy cơ khí.</p>
                    <p>Với tầm nhìn tạo ra những sản phẩm có chất lượng cao nhất và dịch vụ tốt nhất, Datyso liên tục phát triển và dẫn đầu thị trường với những sản phẩm, thiết kế, và công nghệ mới. Tầm nhìn và mục tiêu của DATYSO vẫn được duy trì, cập nhật và phát huy xuyên suốt quá trình phát triển. </p>
                    <p>Ngày nay, DATYSO đã trở lên lớn mạnh với quy mô hơn 100 nhân viên, và phạm vi hoạt động trên cả nước. Các sản phẩm của DATYSO hoàn toàn ưu việt về thiết kế, công nghệ, chất lượng so với các sản phẩm khác trên thị trường, tạo ra đẳng cấp vượt trội. Giải pháp kỹ thuật của DATYSO không chỉ đảm bảo tốt nhất mà còn có tính năng cao cấp, mở rộng, dễ dàng khi lắp đặt và thay thế, nhằm đem lại cho khách hàng những sản phẩm chất lượng tốt nhất, đảm bảo an toàn kỹ thuật.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="section2">
        <div class="text-center text-uppercase mb-2">
            <span class="border-bottom fw-bolder border-dark py-2 text-introduce text-dark-blue fs-3">SỨ MỆNH - TẦM NHÌN - GIÁ trị CỐT LÕI</span>
        </div>
        <div class="bg-new">
            <div class="container">
                <div class="row py-4">
                    <div class="col-sm-4 border-end">
                        <div class="">
                            <div class="text-uppercase text-dark-blue fw-bold text-introduce fs-3 mb-4">Sứ mệnh</div>
                            <div class="fs-7">
                                <p>Thông qua hoạt động kinh doanh để góp phần xây dựng đất nước Việt Nam ngày càng phát triển.</p>
                                <ul>
                                    <li>Với cổ đông và cán bộ công nhân viên: Mang lại sự hài lòng cho toàn bộ cán bộ công nhân viên, cổ đông công ty cũng như gia đình họ về mặt vật chất và tinh thần.</li>
                                    <li>Với Khách hàng và Đối tác: Cung cấp, cải tiến cho thị trường những sản phẩm, dịch vụ với chất lượng tốt.</li>
                                    <li>Với cộng đồng: Hài hòa và chia sẻ lợi ích với cộng đồng. Đóng góp tích cực vào sự phát triển của xã hội.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 border-end">
                        <div class="">
                            <div class="text-uppercase text-dark-blue fw-bold text-introduce fs-3 mb-4">Tầm nhìn</div>
                            <div class="fs-7">
                                <p>Tới năm 2025 Trở thành tập đoàn thương mại hàng đầu Việt Nam trên cơ sở nâng cấp các sản phẩm công nghê và xây dựng hệ thống chi nhánh phân phối tới tận tay người tiêu dùng.</p>
                                <ul>
                                    <li>Mang các sản phẩm công nghệ về máy cơ khí của thế giới chuyển giao cho các cá nhân   tổ chức trong nước, đồng thời cải tiến các sản phẩm hiện có để phục vụ lợi ích cao nhất cho người sử dụng.</li>
                                    <li>Đến năm 2025 nằm trong nhóm 3 công ty hàng đầu Việt Nam về cung cấp và phân phối các sản phẩm máy cơ khí với doanh số trên 1.000.000.000.000 VNĐ/năm.</li>
                                    <li>Mở rộng và phát triển  hoạt động kinh doanh bằng hình thức tăng thêm hệ thống chi nhánh để phục vụ nhiều đối tượng khách hàng. Tới năm 2025 mở được 85 hệ thống chi nhánh với doanh thu bình quân mỗi chi nhánh đạt 1.000.000.000 VNĐ/ Tháng ).</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="fs-7">
                            <div class="text-uppercase text-dark-blue fw-bold text-introduce fs-3 mb-4">Giá trị cốt lõi</div>
                            <div>
                                <ol>
                                    <li><span class="fw-semibold">Trung:</span> Con người Datyso luôn hướng tới sự trung thực trong mọi trường hợp:
                                        <ul>
                                            <li>Trung thực trong công ty</li>
                                            <li>Trung thực với khách hàng</li>
                                            <li>Trung thực với người thân và mọi mối quan hệ của mình.</li>
                                        </ul>
                                    </li>
                                    <li><span class="fw-semibold">Tâm:</span> Con người Datyso luôn nỗ lực tận tâm trong công việc:
                                        <ul>
                                            <li>Phục vụ khách hàng</li>
                                            <li>Coi trọng đạo đức và tuân thủ pháp luật.</li>
                                        </ul>
                                    </li>
                                    <li><span class="fw-semibold">Tín:</span> Con người Datyso luôn đặt chữ tín như một lời cam kết đối với khách hàng, đối tác và nhân viên.</li>
                                    <li><span class="fw-semibold">Nhân:</span> Chúng tôi luôn coi con người là tài sản quý nhất để đào tạo, học hỏi và phát triển với tinh thần khởi nghiệp cao.</li>
                                    <li><span class="fw-semibold">Đồng:</span> Chúng tôi luôn hài hòa và chia sẻ lợi ích với cộng đồng. Đóng góp tích cực vào sự phát triển của xã hội</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section3" class="container">
        <div class="text-center text-uppercase py-4">
            <span class="border-bottom fw-bolder border-dark py-2 text-introduce text-dark-blue fs-3">SLOGAN - ĐỊNH HƯỚNG PHÁT TRIỂN</span>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3 bg-new py-4 rounded-start  img-introduce">
                        <img src="{{asset ('asset/images/image-removebg-preview.png ') }}" alt="" class="w-100">
                    </div>
                    <div class="col-sm-9 bg-new py-4 rounded-end">
                        <p class="text-dark-blue fs-5 fw-bold">Slogan “Nâng Tầm Giá Trị”</p>
                        <span class="fs-7">Datyso Việt Nam luôn hướng đến mang giá trị cho khách hàng vượt ra ngoài những gì khách hàng mong đợi. Khi khách hàng mua hàng ngoài giá trị sản phẩm khách hàng được nhận Datyso còn hướng đến nâng cấp dịch vụ, nâng cấp sản phẩm và hỗ trợ khách hàng để gia tăng giá trị cho khách hàng nhiều hơn</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3 bg-new py-4 rounded-start  img-introduce">
                        <img src="{{asset ('asset/images/image-removebg-preview.png ') }}"  alt="" class="w-100">
                    </div>
                    <div class="col-sm-9 bg-new py-4 rounded-end">
                        <p class="text-dark-blue fs-5 fw-bold">Slogan “Nâng Tầm Giá Trị”</p>
                        <span class="fs-7">Datyso Việt Nam luôn hướng đến mang giá trị cho khách hàng vượt ra ngoài những gì khách hàng mong đợi. Khi khách hàng mua hàng ngoài giá trị sản phẩm khách hàng được nhận Datyso còn hướng đến nâng cấp dịch vụ, nâng cấp sản phẩm và hỗ trợ khách hàng để gia tăng giá trị cho khách hàng nhiều hơn</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3 bg-new py-4 rounded-start  img-introduce">
                        <img src="{{asset ('asset/images/image-removebg-preview.png ') }}"  alt="" class="w-100">
                    </div>
                    <div class="col-sm-9 bg-new py-4 rounded-end">
                        <p class="text-dark-blue fs-5 fw-bold">Slogan “Nâng Tầm Giá Trị”</p>
                        <span class="fs-7">Datyso Việt Nam luôn hướng đến mang giá trị cho khách hàng vượt ra ngoài những gì khách hàng mong đợi. Khi khách hàng mua hàng ngoài giá trị sản phẩm khách hàng được nhận Datyso còn hướng đến nâng cấp dịch vụ, nâng cấp sản phẩm và hỗ trợ khách hàng để gia tăng giá trị cho khách hàng nhiều hơn</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3 bg-new py-4 rounded-start  img-introduce">
                        <img src="{{asset ('asset/images/image-removebg-preview.png ') }}"  alt="" class="w-100">
                    </div>
                    <div class="col-sm-9 bg-new py-4 rounded-end">
                        <p class="text-dark-blue fs-5 fw-bold">Slogan “Nâng Tầm Giá Trị”</p>
                        <span class="fs-7">Datyso Việt Nam luôn hướng đến mang giá trị cho khách hàng vượt ra ngoài những gì khách hàng mong đợi. Khi khách hàng mua hàng ngoài giá trị sản phẩm khách hàng được nhận Datyso còn hướng đến nâng cấp dịch vụ, nâng cấp sản phẩm và hỗ trợ khách hàng để gia tăng giá trị cho khách hàng nhiều hơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section4" class="container">
        <div class="text-center text-uppercase py-4">
            <span class="border-bottom fw-bolder border-dark py-2 text-introduce text-dark-blue fs-3">ĐỐI TÁC & KHÁCH HÀNG</span>
        </div>
        <div class="row mb-4">
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/sonha.png') }}" class="w-100 object-fit-cover" style="height: 238px;" alt="">
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/teraco.png') }}" class="w-100 object-fit-cover" style="height: 238px;" alt="">
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/hoa-phat.png') }}" class="w-100 object-fit-cover" style="height: 238px;" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/anthinh.png') }}" class="w-100 object-fit-cover" style="height: 418px;"  alt="">
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/coma26.jfif') }}" class="w-100 object-fit-cover" style="height: 418px;"  alt="">
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('asset/images/rahy.png') }}" class="w-100 object-fit-cover" style="height: 418px;"  alt="">
            </div>
        </div>

        <div class="text-center text-uppercase py-4">
            <div class="py-2 text-introduce text-dark-blue fs-3 mb-4"><span class="border-bottom fw-bolder">HOẠT ĐỘNG CỦA DATYSO</span></div>
        </div>
    </div>
</div>
<div class="modal fade modal-xl" id="introduce_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hồ sơ công ty</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @include('user.introduce.catalog')
        </div>
    </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
