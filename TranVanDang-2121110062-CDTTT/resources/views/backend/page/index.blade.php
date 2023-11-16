@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'BÀI VIẾT' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 900px">
                                <a class="btn btn-sm btn-info" href="{{ route('page.create') }}">
                                    <i class="fas fa-save"></i> Thêm
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ route('page.trash') }}">
                                    <i class="fas fa-trash"></i> Thùng rác
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#</th>

                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Hình</th>

                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tiêu đề
                                    </th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Miêu tả
                                    </th>

                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">Chức
                                        năng</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @includeIf('backend.message')
                                @foreach ($pages as $page)
                                    <tr class="text-center">
                                        <td>
                                            <input type="checkbox" name="checkId[]" value="{{ $page->id }}">
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('images/page/' . $page->image) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{ $page->name }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $page->title }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $page->description }}</p>
                                        </td>

                                        <td class="text-center ">
                                            <div
                                                style="display: flex; justify-content: center; align-items: center; gap:15px;">
                                                @if ($page->status == 1)
                                                    <a href="{{ route('page.status', ['page' => $page->id]) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('page.status', ['page' => $page->id]) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('page.edit', ['page' => $page->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('page.show', ['page' => $page->id]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('page.delete', ['page' => $page->id]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                {{ $page->id }}
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
@endsection
