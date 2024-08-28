@section('headerTitle', 'Quản trị - Danh sách sản phẩm')
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
            <li class="breadcrumb-item active">Danh mục sản phẩm </li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="bg-white mx-3 p-3 shadow-sm">
    @include('admin.core.alert')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="fs-3 m-0">
            Danh sách sản phẩm
        </h1>
        <a href="{{ route('admin.product.create') }}" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                class="bi bi-plus-lg mt-n1" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
            Tạo mới
        </a>
    </div>

    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center" width="5%">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col" class="text-center" width="30%">Ảnh</th>
                    <th scope="col" class="text-center" width="30%">Thời gian</th>
                    <th scope="col" class="text-center" width="30%">Điểm</th>
                    <th scope="col" class="text-center" width="10%">Trạng thái</th>
                    <th scope="col" class="text-center" width="10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th class="text-center"></th>
                        <td>{{ $product->title }}</td>
                        <div class="col-ms-4">
                            <td class="text-center">
                                <img style="width:80%" src="{{ $product->image }}"
                                    alt="Firebase Image">
                            </td>
                        </div>
                        <td  class="text-center">{{ $product->date_product }}</td>
                        <td  class="text-center">{{ $product->point }}</td>
                        <td class="text-center">
                            <div class="form-check form-switch ms-4 d-flex justify-content-center">
                                <form action="{{ route('admin.product.status', ['id' => $product->id]) }}" method="POST"
                                    id="form-status-{{ $product->id }}">
                                    @csrf
                                    <input type="checkbox"
                                        class="form-check-input status {{ $product->status == 1 ? 'active-item' : 'deactive-item' }}"
                                        name="status" data-value="{{ $product->id }}" id="status-{{ $product->id }}"
                                        {{ $product->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" type="hidden" for="status-{{ $product->id }}"></label>
                                </form>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href='{{ route('admin.product.update', ['id' => $product->id]) }}'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    fill="currentColor" class="bi bi-pencil-square text-dark mt-n1"
                                    viewBox="0 0 16 16" data-toggle="tooltip" data-placement="top" title="Cập nhập">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('footer')
    <script src="{{ asset('asset/js/datatable.js') }}"></script>
    <script src="{{ asset('asset/js/status.js') }}"></script>
@endsection