@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'THÊM KHÁCH HÀNG' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 700px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Thêm]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('customer.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsivee p-0">
                            <div class="row">
                                <div class="col-md-8 "
                                    style="
                                width: 777px;
                                margin-left: 18px;
                            ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tên khách hàng</strong></label>
                                        <input id="name"name="name" type="text"
                                            class="form-control bg-light text-black" placeholder="Nhập tên khách hàng"
                                            value="{{ old('name') }}">
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Email</strong></label>
                                        <input id="email"name="email" type="text"
                                            class="form-control bg-light text-black" placeholder="Email"
                                            value="{{ old('email') }}"> {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Số điện thoại</strong></label>
                                        <input id="phone"name="phone" type="text"
                                            class="form-control bg-light text-black" placeholder="phone"
                                            value="{{ old('phone') }}"> {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Địa chỉ</strong></label>
                                        <input id="address"name="address" type="text"
                                            class="form-control bg-light text-black" placeholder="Địa chỉ"
                                            value="{{ old('address') }}"> {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('address'))
                                            <div class="text-danger">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tên đăng nhập</strong></label>
                                        <input id="username"name="username" type="text"
                                            class="form-control bg-light text-black" placeholder="Tên đăng nhập"
                                            value="{{ old('username') }}"> {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('username'))
                                            <div class="text-danger">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Mật khẩu</strong></label>
                                        <input id="password"name="password" type="password"
                                            class="form-control bg-light text-black" placeholder="Mật khẩu"
                                            value="{{ old('password') }}"> {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label"><strong>Người tạo</strong></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="roles"
                                                id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="roles"
                                                id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">Nhân viên</label>
                                        </div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Trạng thái</strong></label>
                                        <select name="status" class="form-control bg-light">
                                            <option value="1">Xuất bản</option>
                                            <option value="2">Chưa xuất bản</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
@endsection
{{-- @section('script')
<script>
    validateInput(['#name', '#metakey', '#metadesc'], 'Vui lòng nhập trường này');
    $('#create').submit(function(e) {
        let fieldIds = ['name', 'metakey', 'metadesc']
        handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
    });
</script>
@endsection --}}
