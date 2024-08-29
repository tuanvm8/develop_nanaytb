@extends('user.main')
@section('templateContent')
    <main class="mb-5">
        <div class="head_page">
            <div class="container">

                <span><b>Trang chủ / Tin Tức </b></span>
            </div>
        </div>

        <div class="container">
            <div class="row g-3 row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-6" id="result">
            </div>
        </div>
        <script src="templates/js/jquery.twbsPagination.js"></script>
    </main>
@endsection
