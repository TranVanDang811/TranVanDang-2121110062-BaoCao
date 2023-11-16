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
                                <a class="btn btn-sm btn-info" href="{{ route('category.index') }}">
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
                                        {{ $id = $category?->id; }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Tên danh mục</strong>
                                    </td>
                                    <td>
                                        {{ $name = $category?->name;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Slug</strong>
                                    </td>
                                    <td>
                                        {{ $slug = $category?->slug;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Mã cấp cha</strong>
                                    </td>
                                    <td>
                                        {{ $parent_id = $category?->parent_id;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Sắp xếp</strong>
                                    </td>
                                    <td>
                                      {{ $sort_order = $category?->sort_order;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Mức</strong>
                                    </td>
                                    <td>
                                        {{ $level = $category?->level;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Hình ảnh</strong>
                                    </td>
                                    <td>
                                      {{ $image = $category?->image;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Từ khóa tìm kiếm</strong>
                                    </td>
                                    <td>
                                     {{ $metakey = $category?->metakey;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Mô tả</strong>
                                    </td>
                                    <td>
                                       {{ $metadesc = $category?->metadesc;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_at = $category?->created_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_by = $category?->created_by;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày sửa cuối</strong>
                                    </td>
                                    <td>
                                      {{ $updated_at = $category?->updated_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người sửa cuối</strong>
                                    </td>
                                    <td>
                                    {{ $updated_by = $category?->updated_by;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Trạng thái</strong>
                                    </td>
                                    <td>
                                 {{ $status = $category?->status;  }}
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
