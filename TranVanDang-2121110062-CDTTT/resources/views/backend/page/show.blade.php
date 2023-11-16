@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'CHI TIẾT THƯƠNG HIỆU' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 800px">
                                <a class="btn btn-sm btn-info" href="{{ route('page.index') }}">
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
                                        {{ $id = $pages?->id; }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Tên bài viết</strong>
                                    </td>
                                    <td>
                                        {{ $name = $pages?->title;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Slug</strong>
                                    </td>
                                    <td>
                                        {{ $slug = $pages?->slug;  }}
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <strong>Hình ảnh</strong>
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/pages/' . $pages->image) }}"
                                        class="avatar avatar-sm me-3 border-radius-lg"
                                        alt="{{ $pages->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Miêu tả</strong>
                                    </td>
                                    <td>
                                      {{ $image = $pages?->description;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Chi tiết</strong>
                                    </td>
                                    <td>
                                      {{ $image = $pages?->detail;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_at = $pages?->created_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_by = $pages?->created_by;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày sửa cuối</strong>
                                    </td>
                                    <td>
                                      {{ $updated_at = $pages?->updated_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người sửa cuối</strong>
                                    </td>
                                    <td>
                                    {{ $updated_by = $pages?->updated_by;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Trạng thái</strong>
                                    </td>
                                    <td>
                                 {{ $status = $pages?->status;  }}
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
