@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'CHI TIẾT ĐƠN HÀNG' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 800px">
                                <a class="btn btn-sm btn-info" href="{{ route('order.index') }}">
                                    <i class="fas fa-undo-alt"></i> Quay về danh sách
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-body px-0 pb-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Khách hàng:{{$order->name}}</th>

                                <th class="text-center">Giá trị</th>

                            </tr>
                        </thead>
                        <tbody class="text-left">

                        </tbody>
                    </table>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                        Hình</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tên
                                        sản phẩm</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                        Số lượng</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                        Giá</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                        Thành tiền</th>



                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetail as $orderdetail)
                                    <tr class="text-center">
                                        <td>
                                            <input type="checkbox" name="checkId[]" value="{{ $orderdetail->product_id }}">
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('images/product/' . $orderdetail->image) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{ $orderdetail->name }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->name }}</p>

                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->qty }}</p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->price }}</p>

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">
                                                {{ $orderdetail->amount }}</p>

                                        </td>


                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                {{ $orderdetail->product_id }}
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
