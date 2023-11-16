@extends('layout.admin')
@section('title', $title ?? 'Trang quản trị')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex">
          <h6 class="text-white text-capitalize ps-3">{{ $title ?? 'THÙNG RÁC MENU' }}</h6>
          <div class="row">
            <div class="col-md-12 " style="margin-left: 800px">
                <a class="btn btn-sm btn-info" href="{{ route('menu.index') }}">
                    <i class="fas fa-undo-alt"></i> Quay về danh sách
                </a>
            </div>

        </div>
        </div>

      </div>

      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">#</th>

                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Hình</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tên menu</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Link</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Vị trí</th>
                <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Ngày tạo</th>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">Chức năng</th>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 text-center">ID</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $menu)
              <tr class="text-center">
                <td>
                  <input type="checkbox" name="checkId[]" value="{{ $menu->id }}">
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="{{asset('images/menu/'.$menu->image) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $menu->name }}">
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 text-center"> {{ $menu->name }}</p>

                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0 text-center"> {{ $menu->link }}</p>

                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 text-center"> {{ $menu->position }}</p>

                  </td>
                <td class="align-middle text-center text-sm">
                  {{-- <span class="badge badge-sm bg-gradient-success">Online</span> --}}
                  {{ $menu->created_at }}
                </td>
                <td class="text-center ">
                  <div style="display: flex; justify-content: center; align-items: center; gap:15px;">
                      <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                          class="btn btn-sm btn-info">
                          <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('menu.restore', ['menu' => $menu->id]) }}"
                          class="btn btn-sm btn-primary">
                          <i class="fas fa-undo-alt"></i>
                      </a>
                      <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}"
                          method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i>
                          </button>
                      </form>
                  </div>
              </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
@endsection