@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('page.update',['page'=>$pages->id]) }}" method="page" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-2">{{ $title ?? 'THÊM BÀI VIẾT' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 800px">
                                    <button name="THEM" type="submit" class="btn btn-sm btn-light">
                                        <i class="fas fa-save"></i> Lưu[Thêm]
                                    </button>
                                    <a class="btn btn-sm btn-info" href="{{ route('page.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsivee p-0">
                            <div class="row">
                                <div class="col-md-8 "  style="
                                width: 777px;
                                margin-left: 18px;
                            ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tên trang đơn</strong></label>
                                        <input name="title" type="text" class="form-control bg-light text-black"
                                            placeholder="Nhập tên trang đơn" value="{{$pages->title}}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Miêu tả</strong></label>
                                        <textarea name="description" type="text" class="form-control bg-light text-black"
                                            placeholder="Nhập miêu tả trang đơn" cols="10" value="{{$pages->description}}"></textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label"><strong>Chi tiết</strong></label>
                                        <textarea class="form-control" name="detail" id="editor1" rows="3" cols="80"></textarea>

                                    </div>

                                </div>
                                <div class="col-md-4 ">



                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Hình đại diện</strong></label>
                                            <input name="image"type="file" class="form-control bg-light">
                                        </div>
                                    </div>

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
