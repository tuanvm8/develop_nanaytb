@extends('user.main')
@section('templateContent')
<main class="mb-5">
    <div class="head_page">
        <div class="container">

            <ol vocab="https://schema.org/" typeof="BreadcrumbList" class="breadcrumb">
                <li property="itemListElement" typeof="ListItem" class="breadcrumb-item">
                    <a property="item" typeof="WebPage" href="index.html">
                        <span property="name">Trang chủ</span></a>
                    <meta property="position" content="1">
                </li>

                <li property="itemListElement" typeof="ListItem" class="breadcrumb-item active">
                    <a property="item" typeof="WebPage" href="gioi-thieu.html">
                        <span property="name">Giới thiệu</span></a>
                    <meta property="position" content="2">
                </li>
            </ol>
        </div>
    </div>
    <div class="container">

        <div class="mota_danhmuc">
        </div>
    </div>
</main>
@endsection