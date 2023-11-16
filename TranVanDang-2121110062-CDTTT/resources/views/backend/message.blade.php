{{-- @if (session('message'))
@php
    $arrmessage=session('message');
@endphp
<div class="alert alert-{{ $arrmessage['type'] }} alert-dismissible text-white" role="alert">
    <strong>Thông báo!</strong> {{ $arrmessage['msg'] }}
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close" fdprocessedid="apjvfb">
        <span aria-hidden="true">x</span>
    </button>
</div>
@endif --}}
@if (session('message'))
@php
    $arrmessage = session('message');
@endphp
<div class="alert alert-{{ $arrmessage['type'] }} alert-dismissible text-white" role="alert">
    <strong>Thông báo!</strong> {{ $arrmessage['msg'] }}
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close" fdprocessedid="apjvfb">
        <span aria-hidden="true">×</span>
    </button>
</div>
<script>
    // Lắng nghe sự kiện click vào nút đóng
    document.querySelector('.alert button[data-dismiss="alert"]').addEventListener('click', function() {
        // Tìm phần tử cha chứa thông báo
        var alertContainer = this.closest('.alert');
        // Xóa phần tử cha khỏi DOM
        alertContainer.remove();
    });
</script>
@endif