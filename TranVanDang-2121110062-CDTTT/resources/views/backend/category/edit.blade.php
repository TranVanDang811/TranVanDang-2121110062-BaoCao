@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('category.update',['category'=>$category->id]) }}" id="create" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'CẬP NHẬT DANH MỤC SẢN PHẨM' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 600px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('category.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsivee p-0">
                            <div class="row">
                                <div class="col-md-8 "     style="
                                width: 777px;
                                margin-left: 18px;
                            ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tên danh mục</strong></label>
                                        <input id="name"name="name" type="text"
                                            class="form-control bg-light text-black" placeholder="Nhập tên danh mục"
                                            value="{{ old('name',$category->name) }}">
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Từ khóa</strong></label>
                                        <textarea id="metakey"name="metakey" class="form-control bg-light text-black" rows="3" placeholder="Từ khóa">{{ old('metakey',$category->metakey) }}</textarea>
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">{{ $errors->first('metakey') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Mô tả</strong></label>
                                        <textarea id="metadesc" name="metadesc" class="form-control bg-light text-black" rows="3" placeholder="Mô tả">{{ old('metadesc',$category->metadesc) }}</textarea>
                                        {{-- <span class="text-danger alert" style="font-size:13px"></span> --}}
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">{{ $errors->first('metadesc') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Danh mục cha</strong></label>
                                        <select name="parent_id" class="form-control bg-light text-black">
                                            <option value="0">Danh mục cha</option>
                                            {!! $html_parent_id !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Sắp xếp</strong></label>
                                        <select name="sort_order" class="form-control bg-light">
                                            <option value="0">Chọn vị trí</option>
                                            {!! $html_sort_order !!}
                                        </select>
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
                                            <option value="1"  {{ ($category->status==1)?'selected':'' }}>Xuất bản</option>
                                            <option value="2"  {{ ($category->status==2)?'selected':'' }}>Chưa xuất bản</option>
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
