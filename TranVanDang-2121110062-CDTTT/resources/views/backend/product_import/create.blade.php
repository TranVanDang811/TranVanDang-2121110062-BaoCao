@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('product_import.store') }}" id="create"method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'THÊM DỮ LIỆU NHẬP HÀNG' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 700px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Thêm]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('product_import.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsivee p-0">
                            <div class="row"
                                style="
                            width: 1177px;
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
                                    <input id="price"name="price" type="text" class="form-control bg-light text-black"
                                        placeholder="Nhập giá sản phẩm">
                                    {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                    @if ($errors->has('price'))
                                        <div class="text-danger">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Số lượng</strong></label>
                                    <input id="qty"name="qty" type="number" class="form-control bg-light text-black"
                                        placeholder="Nhập số lượng sản phẩm">
                                    {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                    @if ($errors->has('qty'))
                                        <div class="text-danger">{{ $errors->first('qty') }}</div>
                                    @endif
                                </div>


                                <div class="mb-3">

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
    validateNumber(['#price', '#qty','#price_sale']);
    validateInput(['#name','#editor1', '#metakey', '#metadesc'], 'Vui lòng nhập trường này');
    $('#create').submit(function(e) {
        let fieldIds = ['name', 'editor1', 'metakey', 'metadesc','price','qty','price_sale']
        handleSubmit(e, fieldIds, 'Vui lòng nhập trường này')
    });
</script>
@endsection --}}
