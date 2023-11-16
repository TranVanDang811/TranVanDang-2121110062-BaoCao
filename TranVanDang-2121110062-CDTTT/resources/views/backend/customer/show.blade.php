@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'CHI TIẾT THÀNH VIÊN' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 800px">
                                <a class="btn btn-sm btn-info" href="{{ route('customer.index') }}">
                                    <i class="fas fa-undo-alt"></i> Quay về danh sách
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-gradient-primary">
                                    <th class="text-center text-light" style="width:10px">Tên trường</th>

                                    <th class="text-center text-light" style="width:80px">Giá trị</th>

                                </tr>
                            </thead>
                            <tbody class="text-left">
                                <tr>
                                    <td>
                                        <strong>Id</strong>
                                    </td>
                                    <td>
                                        {{ $id = $customer?->id; }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Tên thành viên</strong>
                                    </td>
                                    <td>
                                        {{ $name = $customer?->name;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>email</strong>
                                    </td>
                                    <td>
                                        {{ $email = $customer?->email;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Số điện thoại</strong>
                                    </td>
                                    <td>
                                      {{ $phone = $customer?->phone;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Tên đăng nhập</strong>
                                    </td>
                                    <td>
                                     {{ $customername = $customer?->username;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Địa chỉ</strong>
                                    </td>
                                    <td>
                                       {{ $address = $customer?->address;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Cấp người dùng</strong>
                                    </td>
                                    <td>
                                       {{ $roles = $customer?->roles;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_at = $customer?->created_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_by = $customer?->created_by;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày sửa cuối</strong>
                                    </td>
                                    <td>
                                      {{ $updated_at = $customer?->updated_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người sửa cuối</strong>
                                    </td>
                                    <td>
                                    {{ $updated_by = $customer?->updated_by;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Trạng thái</strong>
                                    </td>
                                    <td>
                                 {{ $status = $customer?->status;  }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
