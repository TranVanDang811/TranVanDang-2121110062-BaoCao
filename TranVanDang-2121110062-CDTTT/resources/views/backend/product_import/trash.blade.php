@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
          <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'THÙNG RÁC NHẬP HÀNG' }}</h6>
          <div class="row">
            <div class="col-md-12 " style="margin-left: 800px">
                <a class="btn btn-sm btn-info" href="{{ route('product_import.index') }}">
                    <i class="fas fa-undo-alt"></i> Quay về danh sách
                </a>
            </div>

        </div>
        </div>

      </div>

      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#</th>

                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Hình</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tên sản phẩm</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Danh mục</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Thương hiệu</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Ngày tạo</th>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">Chức năng</th>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($list as $product)
              <tr class="text-center">
                <td>
                  <input type="checkbox" name="checkId[]" value="{{ $product->id }}">
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="{{asset('images/product/'.$product->image) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $product->name }}">
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 text-center"> {{ $product->name }}</p>

                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0 text-center"> {{ $product->category_id }}</p>

                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 text-center"> {{ $product->brand_id }}</p>

                  </td>
                <td class="align-middle text-center text-sm">
                  {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                  {{ $product->created_at }}
                </td>
                <td class="text-center ">
                  <div style="display: flex; justify-content: center; align-items: center; gap:15px;">
                      <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                          class="btn btn-sm btn-info">
                          <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('product.restore', ['product' => $product->id]) }}"
                          class="btn btn-sm btn-primary">
                          <i class="fas fa-undo-alt"></i>
                      </a>
                      <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                          method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                          </button>
                      </form>
                  </div>
              </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    {{ $product->id }}
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
