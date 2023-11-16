@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'THƯƠNG HIỆU' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 900px">
                                <a class="btn btn-sm btn-info" href="{{ route('orderdetail.create') }}">
                                    <i class="fas fa-save"></i> Thêm
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


                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Mã
                                        đơn hàng</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Mã
                                        sản phẩm</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Giá
                                    </th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Số
                                        lượng</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">
                                        Thành tiền</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $orderdetail)
                                    <tr class="text-center">
                                        <td>
                                            <input type="checkbox" name="checkId[]" value="{{ $orderdetail->id }}">
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->order_id }}
                                            </p>

                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->product_id }}
                                            </p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $orderdetail->price }}
                                            </p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $orderdetail->qty }}
                                            </p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $orderdetail->amount }}
                                            </p>

                                        </td>

                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                {{ $orderdetail->id }}
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
