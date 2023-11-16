@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                            <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'MENU' }}</h6>
                            <div class="row">
                                <div class="col-md-12 " style="margin-left: 1000px">
                                    {{-- <a class="btn btn-sm btn-info" href="{{ route('menu.create') }}">
                                        <i class="fas fa-save"></i> Thêm
                                    </a> --}}
                                    <a class="btn btn-sm btn-danger" href="{{ route('menu.trash') }}">
                                        <i class="fas fa-trash"></i> Thùng rác
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsives p-0">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item border  "
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header p-2 " id="headingPosition">
                                                <label for="position">
                                                    <h6>Vị trí</h6>
                                                </label>

                                                <select name="position" id="position"
                                                    class="form-control border border-info" style="padding-left: 20px">

                                                    <option value="mainmenu">Main menu</option>
                                                    <option value="footermenu">Footer menu</option>
                                                </select>
                                            </h2>
                                        </div>
                                        {{-- danh mục --}}
                                        <div class="accordion-item border mt-3"
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header " id="headingCategory">
                                                <button class="accordion-button collapsed" style="padding-left: 60px"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseCategory" aria-expanded="false"
                                                    aria-controls="collapseCategory">
                                                    DANH MỤC SẢN PHẨM
                                                </button>
                                            </h2>
                                            <div id="collapseCategory" class="accordion-collapse collapse "
                                                aria-labelledby="headingCategory" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php foreach($list_category as $category):?>
                                                    <div class="form-check">
                                                        <input name="checkIdCategory[]" class="form-check-input"
                                                            type="checkbox" value="{{ $category->id }}"
                                                            id="checkCategory{{ $category->id }}">
                                                        <label class="form-check-label"
                                                            for="checkCategory{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </label>

                                                    </div>
                                                    <?php endforeach;?>
                                                    <div class="text-center">
                                                        <input class="btn btn-success form-control mt-3 w-75 "
                                                            type="submit" name="ADDCATEGORY" value="Thêm" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Thương hiệu --}}
                                        <div class="accordion-item border mt-3"
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header " id="headingBrand">
                                                <button class="accordion-button collapsed" style="padding-left: 80px"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand"
                                                    aria-expanded="false" aria-controls="collapseBrand">
                                                    THƯƠNG HIỆU
                                                </button>
                                            </h2>
                                            <div id="collapseBrand" class="accordion-collapse collapse "
                                                aria-labelledby="headingBrand" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php foreach($list_brand as $brand):?>
                                                    <div class="form-check">
                                                        <input name="checkIdBrand[]" class="form-check-input" type="checkbox"
                                                            value="{{ $brand->id }}" id="checkBrand{{ $brand->id }}">
                                                        <label class="form-check-label" for="checkBrand{{ $brand->id }}">
                                                            {{ $brand->name }}
                                                        </label>

                                                    </div>
                                                    <?php endforeach;?>

                                                    <div class="text-center">
                                                        <input class="btn btn-success form-control mt-3 w-75 "
                                                            type="submit" name="ADDBRAND" value="Thêm" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- TOPIC --}}
                                        <div class="accordion-item border mt-3"
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header " id="headingTopic">
                                                <button class="accordion-button collapsed" style="padding-left: 100px"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTopic"
                                                    aria-expanded="false" aria-controls="collapseTopic">
                                                    CHỦ ĐỀ
                                                </button>
                                            </h2>
                                            <div id="collapseTopic" class="accordion-collapse collapse "
                                                aria-labelledby="headingTopic" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php foreach($list_topic as $topic):?>
                                                    <div class="form-check">
                                                        <input name="checkIdTopic[]" class="form-check-input" type="checkbox"
                                                            value="{{ $topic->id }}"
                                                            id="checkTopic{{ $topic->id }}">
                                                        <label class="form-check-label"
                                                            for="checkTopic{{ $topic->id }}">
                                                            {{ $topic->name }}
                                                        </label>

                                                    </div>
                                                    <?php endforeach;?>

                                                    <div class="text-center">
                                                        <input class="btn btn-success form-control mt-3 w-75 "
                                                            type="submit" name="ADDTOPIC" value="Thêm" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Page --}}
                                        <div class="accordion-item border mt-3"
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header " id="headingPage">
                                                <button class="accordion-button collapsed" style="padding-left: 85px"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapsePage" aria-expanded="false"
                                                    aria-controls="collapsePage">
                                                    TRANG ĐƠN
                                                </button>
                                            </h2>
                                            <div id="collapsePage" class="accordion-collapse collapse "
                                                aria-labelledby="headingPage" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">


                                                    <div class="text-center">
                                                        <input class="btn btn-success form-control mt-3 w-75 "
                                                            type="submit" name="ADDPAGE" value="Thêm" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Tùy liên kết --}}
                                        <div class="accordion-item border mt-3"
                                            style="margin-left: 10px;box-shadow:  1px 1px 5px #cfcece;">
                                            <h2 class="accordion-header " id="headingcustom">
                                                <button class="accordion-button collapsed" style="padding-left: 67px"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapsecustom" aria-expanded="false"
                                                    aria-controls="collapsecustom">
                                                    TÙY BIẾN LIÊN KẾT
                                                </button>
                                            </h2>
                                            <div id="collapsecustom" class="accordion-collapse collapse "
                                                aria-labelledby="headingcustom" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div style="margin-left:10px; width:260px;">
                                                        <label class="form-label"><strong>Nhập tên menu</strong></label>
                                                        <input id="name"name="name" type="text"
                                                            class="form-control bg-light text-black"
                                                            placeholder="Nhập tên menu"
                                                            style="
                                                        padding-left: 10px; ">
                                                    </div>
                                                    <div style="margin-left:10px; width:260px;">
                                                        <label class="form-label"><strong>Link</strong></label>
                                                        <input id="link"name="link" type="text"
                                                            class="form-control bg-light text-black"
                                                            placeholder="#"
                                                            style="
                                                            padding-left: 10px; ">
                                                    </div>
                                                    <div class="text-center">
                                                        <input class="btn btn-success form-control mt-3 w-75 "
                                                            type="submit" name="ADDCUSTOM" value="Thêm"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    @includeIf('backend.message')
                                    <table class="table align-items-center mb-0" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#
                                                </th>

                                                <th
                                                    class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                                                    Tên
                                                    menu
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                    Link
                                                </th>
                                                <th
                                                class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Vị trí
                                            </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                    Ngày
                                                    tạo</th>
                                                <th
                                                    class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">
                                                    Chức
                                                    năng</th>
                                                <th
                                                    class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">
                                                    ID
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_menu as $menu)
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="checkbox" name="checkId[]"
                                                            value="{{ $menu->id }}">
                                                    </td>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 text-center">
                                                            {{ $menu->name }}</p>

                                                    </td>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 text-center">
                                                            {{ $menu->link }}</p>

                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0 text-center">
                                                            {{ $menu->position }}</p>

                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                                                        {{ $menu->created_at }}
                                                    </td>
                                                    <td class="text-center ">
                                                        <div
                                                            style="display: flex; justify-content: center; align-items: center; gap:15px;">
                                                            @if ($menu->status == 1)
                                                                <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                                    class="btn btn-sm btn-success">
                                                                    <i class="fas fa-toggle-on"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-toggle-off"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('menu.show', ['menu' => $menu->id]) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('menu.delete', ['menu' => $menu->id]) }}"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="javascript:;"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            {{ $menu->id }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
