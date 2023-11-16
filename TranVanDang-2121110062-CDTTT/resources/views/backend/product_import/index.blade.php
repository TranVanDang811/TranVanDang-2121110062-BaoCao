@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'NHẬP HÀNG' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 800px">
                                {{--
                                <a class="btn btn-sm btn-danger" href="{{ route('product_import.trash') }}">
                                    <i class="fas fa-trash"></i> Thùng rác
                                </a> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class ="col-sm-3 ">
                        <form action="{{ route('product_import.store') }}" id="create"method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsivee p-0">
                                    <div class="row"
                                        style="

                                    margin-left: 18px;
                                ">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Chọn sản phẩm</strong></label>
                                            <select name="product_id" class="form-control bg-light">
                                                <option value="0">Chọn sản phẩm</option>
                                                {!! $html_product_id !!}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Giá sản phẩm</strong></label>
                                            <input id="price"name="price" type="text"
                                                class="form-control bg-light text-black" placeholder="Nhập giá sản phẩm">
                                            {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                            @if ($errors->has('price'))
                                                <div class="text-danger">{{ $errors->first('price') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Số lượng</strong></label>
                                            <input id="qty"name="qty" type="number"
                                                class="form-control bg-light text-black"
                                                placeholder="Nhập số lượng sản phẩm">
                                            {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                            @if ($errors->has('qty'))
                                                <div class="text-danger">{{ $errors->first('qty') }}</div>
                                            @endif
                                        </div>


                                        <div class="mb-3">
                                            <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                                <i class="fas fa-save"></i> Lưu[Thêm]
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                    <div class ="col-sm-9 ">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#</th>
                                            <th
                                                class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">
                                                ID
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Tên
                                                sản phẩm</th>
                                            <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Giá Sản Phẩm</th>
                                            <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Số lượng</th>
                                            <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Tổng số tiền
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Ngày
                                                tạo</th>
                                            <th
                                                class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">
                                                Chức
                                                năng</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @includeIf('backend.message')
                                        @foreach ($list as $product_import)
                                            <tr class="text-center">
                                                <td>
                                                    <input type="checkbox" name="checkId[]"
                                                        value="{{ $product_import->id }}">
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $product_import->id }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-center">
                                                        {{ $product_import->name_product }}</p>

                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-center">
                                                        {{ $product_import->price }}
                                                    </p>

                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-center">
                                                        {{ $product_import->qty }}
                                                    </p>

                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-center">
                                                        {{ number_format($product_import->qty * $product_import->price) }}đ
                                                    </p>

                                                </td>

                                                {{-- <td>
                                    <p class="text-xs font-weight-bold mb-0 text-center"> {{ $product_import->price_wholesale }}
                                    </p>

                                </td> --}}
                                                <td class="align-middle text-center text-sm">
                                                    {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                                                    {{ $product_import->created_at }}
                                                </td>
                                                <td class="text-center ">
                                                    <div
                                                        style="display: flex; justify-content: center; align-items: center; gap:5px;">
                                                        {{-- @if ($product_import->status == 1)
                                                            <a href="{{ route('product_import.status', ['product_import' => $product_import->id]) }}"
                                                                class="btn btn-sm btn-success">
                                                                <i class="fas fa-toggle-on"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('product_import.status', ['product_import' => $product_import->id]) }}"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-toggle-off"></i>
                                                            </a>
                                                        @endif --}}
                                                        {{-- <a href="{{ route('product_import.edit', ['product_import' => $product_import->id]) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('product_import.show', ['product_import' => $product_import->id]) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a> --}}

                                                        <form
                                                            action="{{ route('product_import.destroy', ['product_import' => $product_import->id]) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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
        </div>
    </div>
@endsection
