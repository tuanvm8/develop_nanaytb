@section('headerTitle', 'Quản trị - Trang chủ')
@extends('admin.layout')
@section('headerStyle')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('templateContent')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-decoration-none">Trang chủ </a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
