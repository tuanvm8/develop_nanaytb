@section('headerTitle', 'Quản trị - Danh sách rút tiền')
@extends('admin.layout')
@section('templateContent')
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" class="text-decoration-none">Trang chủ </a> 
            </li>
            <li class="breadcrumb-item active">Danh mục rút tiền </li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="bg-white mx-3 p-3 shadow-sm">
    @include('admin.core.alert')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="fs-3 m-0">
            Danh sách rút tiền
        </h1>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center" width="5%">#</th>
                    <th scope="col" class="text-center" width="10%">Tên</th>
                    <th scope="col" class="text-center" width="10%">Ngân hàng</th>
                    <th scope="col" class="text-center" width="20%">Số tiền</th>
                    <th scope="col" class="text-center" width="15%">Số tài khoản</th>
                    <th scope="col" class="text-center" width="30%">Chi nhánh</th>
                    <th scope="col" class="text-center" width="30%">Người giới thiệu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdRawMoneys as $withdRawMoney)
                    <tr>
                        <th class="text-center"></th>
                        <td class="text-center">{{ $withdRawMoney->user->username }}</td>
                        <td class="text-center">{{ $withdRawMoney->name_bank }}</td>
                        <td class="text-center">{{ $withdRawMoney->point }}</td>
                        <td class="text-center">{{ $withdRawMoney->account_number }}</td>
                        <td class="text-center">{{ $withdRawMoney->branch }}</td>
                        <td class="text-center">{{ $withdRawMoney->introducee }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('footer')
    <script src="{{ asset('asset/js/datatable.js') }}"></script>
@endsection