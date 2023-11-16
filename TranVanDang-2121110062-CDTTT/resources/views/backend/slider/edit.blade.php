@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('slider.update', ['slider' => $slider->id]) }}" id="create"method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'CẬP NHẬT SLIDER' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 750px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Thêm]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('slider.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsivee p-0"
                            style="
                        width: 1187px;
                        margin-left: 18px;
                    ">

                            <div class="mb-3">
                                <label class="form-label "><strong>Tên Slider</strong></label>
                                <input id="name"name="name" type="text"
                                    class="form-control bg-light text-black"placeholder="Nhập tên slider"
                                    value="{{ $slider->name }}">
                                <span class="text-danger alert" style="font-size:13px"></span>

                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Liên kết</strong></label>
                                <input id="link"name="link" type="text"
                                    class="form-control bg-light text-black"placeholder="#" value="{{ $slider->link }}">
                                <span class="text-danger alert" style="font-size:13px"></span>

                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Vị trí</strong></label>
                                        <select name="position" class="form-control bg-light text-black">
                                            <option value="Slidershow">slidershow</option>
                                            <option value="Slideroff">slideroff</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Sắp xếp</strong></label>
                                        <select name="sort_order" class="form-control bg-light text-black">
                                            <option value="0">chọn vị trí</option>
                                            {!! $html_sort_order !!}
                                        </select>
                                    </div>
                                </div>

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
                                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Xuất bản
                                    </option>
                                    <option value="2" {{ $slider->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                                    </option>
                                </select>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
@endsection
@section('script')
    <script>
        validateInput(['#name', '#link'], 'Vui lòng nhập trường này');
        $('#create').submit(function(e) {
            let fieldIds = ['name', 'link']
            handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
        });
    </script>
@endsection
