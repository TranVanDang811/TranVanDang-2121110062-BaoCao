@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'CHI TIẾT SẢN PHẨM' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 800px">
                                <a class="btn btn-sm btn-info" href="{{ route('product.index') }}">
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
                                        {{ $id = $product?->id; }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Tên sản phẩm</strong>
                                    </td>
                                    <td>
                                        {{ $name = $product?->name;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Danh mục </strong>
                                    </td>
                                    <td>
                                        {{ $slug = $product?->category_id;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Thương hiệu</strong>
                                    </td>
                                    <td>
                                      {{ $sort_order = $product?->brand_id;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Hình ảnh</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->image;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Slug</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->slug;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Giá</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->price;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Giá khuyến mãi</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->price_sale;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Số lượng</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->qty;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Chi tiết</strong>
                                    </td>
                                    <td>
                                      {{ $image = $product?->detail;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Từ khóa tìm kiếm</strong>
                                    </td>
                                    <td>
                                     {{ $metakey = $product?->metakey;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Mô tả</strong>
                                    </td>
                                    <td>
                                       {{ $metadesc = $product?->metadesc;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_at = $product?->created_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người tạo</strong>
                                    </td>
                                    <td>
                                        {{ $created_by = $product?->created_by;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Ngày sửa cuối</strong>
                                    </td>
                                    <td>
                                      {{ $updated_at = $product?->updated_at;  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Người sửa cuối</strong>
                                    </td>
                                    <td>
                                    {{ $updated_by = $product?->updated_by;  }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Trạng thái</strong>
                                    </td>
                                    <td>
                                 {{ $status = $product?->status;  }}
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
