@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('product.update', ['product' => $product->id]) }}" id="create" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'CẬP NHẬT SẢN PHẨM' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 600px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('product.index') }}">
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
                                        <label class="form-label"><strong>Tên sản phẩm</strong></label>
                                        <input id="name"name="name" type="text"
                                            class="form-control bg-light text-black" placeholder="Nhập tên sản phẩm"
                                            value="{{ old('name', $product->name) }}">
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Chi tiết</strong></label>
                                        <textarea class="form-control" name="detail" id="editor1" rows="3" cols="80">{{ old('detail', $product->detail) }}</textarea>
                                        <span class="text-danger alert" style="font-size:13px"></span>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Từ khóa</strong></label>
                                        <textarea id="metakey"name="metakey" class="form-control bg-light text-black" rows="3" placeholder="Từ khóa">{{ old('metakey', $product->metakey) }}</textarea>
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">{{ $errors->first('metakey') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Mô tả</strong></label>
                                        <textarea id="metadesc" name="metadesc" class="form-control bg-light text-black" rows="3" placeholder="Mô tả">{{ old('metadesc', $product->metadesc) }}</textarea>
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">{{ $errors->first('metadesc') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Danh mục</strong></label>
                                        <select name="category_id" class="form-control bg-light">
                                            <option value="0">Chọn Danh mục</option>
                                            {!! $html_category_id !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Thương hiệu</strong></label>
                                        <select name="brand_id" class="form-control bg-light">
                                            <option value="0">Chọn thương hiệu</option>
                                            {!! $html_brand_id !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Giá nhập</strong></label>
                                        <input id="price_Import"name="price_Import" type="number"
                                            class="form-control bg-light text-black" placeholder="Nhập giá"
                                            value="{{ old('price_Import', $product->price_Import) }}">
                                        <span class="text-danger alert" style="font-size:13px"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Giá bán lẻ sản phẩm</strong></label>
                                        <input id="price_retail"name="price_retail" type="number"
                                            class="form-control bg-light text-black" placeholder="Nhập giá"
                                            value="{{ old('price_retail', $product->price_retail) }}">
                                        <span class="text-danger alert" style="font-size:13px"></span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Hình đại diện</strong></label>
                                            <input name="image"type="file" class="form-control bg-light">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Trạng thái</strong></label>
                                        <select name="status" class="form-control bg-light">
                                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Xuất bản
                                            </option>
                                            <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                                            </option>
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

{{--
@section('script')
<script>
    validateInput(['#name', '#metakey', '#metadesc'], 'Vui lòng nhập trường này');
    $('#create').submit(function(e) {
        let fieldIds = ['name', 'metakey', 'metadesc']
        handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
    });
</script>
@endsection --}}
