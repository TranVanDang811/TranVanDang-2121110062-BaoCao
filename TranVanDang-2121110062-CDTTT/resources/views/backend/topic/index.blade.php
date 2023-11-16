@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
                        <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'CHỦ ĐỀ BÀI VIẾT' }}</h6>
                        <div class="row">
                            <div class="col-md-12 " style="margin-left: 850px">
                                <a class="btn btn-sm btn-info" href="{{ route('topic.create') }}">
                                    <i class="fas fa-save"></i> Thêm
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ route('topic.trash') }}">
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

                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tên
                                        chủ đề</th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Slug
                                    </th>
                                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Ngày
                                        tạo</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">Chức
                                        năng</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @includeIf('backend.message')
                                @foreach ($list as $topic)
                                    <tr class="text-center">
                                        <td>
                                            <input type="checkbox" name="checkId[]" value="{{ $topic->id }}">
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $topic->name }}</p>

                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center"> {{ $topic->slug }}</p>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                                            {{ $topic->created_at }}
                                        </td>
                                        <td class="text-center ">
                                            <div
                                                style="display: flex; justify-content: center; align-items: center; gap:15px;">
                                                @if ($topic->status == 1)
                                                    <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('topic.edit', ['topic' => $topic->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('topic.show', ['topic' => $topic->id]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('topic.delete', ['topic' => $topic->id]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                {{ $topic->id }}
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
