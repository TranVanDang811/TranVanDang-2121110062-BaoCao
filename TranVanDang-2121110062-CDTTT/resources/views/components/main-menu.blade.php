<div class="container">
    <div class='main-menu mb-2 '>
        <ul style="padding: 0px;">
            <li class="ms-3"> <a href='{{ route('site.index') }}'>TRANG CHỦ</a> </li>
            <li class="ms-3"> <a href='{{ route('site.introduce') }}'>GIỚI THIỆU</a> </li>
            <li class="ms-3"> <a href='{{ route('site.products') }}'>SẢN PHẨM</a><i class="fa-solid fa-angle-down"></i>
                <ul class='sub-menu justify-content-between'>
                    <li><a style="font-weight: 600;" href='#'>VALI</a>
                        <ul class="sub-menu2 " style="opacity: 70%;">
                            <li><a href="#">Vali đi theo ngày</a></li>
                            <li><a href="#">Vali theo loại</a></li>
                            <li><a href="#">Thương hiệu nổi bật</a></li>
                        </ul>
                    </li>
                    <li><a style="font-weight: 600;" href='#'>BALO</a>
                        <ul class="sub-menu2 " style="opacity: 70%;">
                            <li><a href="#">Balo theo loại</a></li>
                            <li><a href="#">Balo có ngăn đựng Laptop</a></li>
                            <li><a href="#">Thương hiệu Balo nổi bật</a></li>
                        </ul>
                    </li>
                    <li><a style="font-weight: 600;" href='#'>TÚI XÁCH</a>
                        <ul class="sub-menu2 " style="opacity: 70%;">
                            <li><a href="#">Túi xách theo loại</a></li>
                            <li><a href="#">Thương hiệu Túi xách</a></li>

                        </ul>
                    </li>
                    <li style="padding-right: 210px;"><a style="font-weight: 600;" href='#'>PHỤ KIỆN</a>
                        <ul class="sub-menu2 ">
                            <li><a style="opacity: 70%;" href="#">Phụ kiện
                                    theo loại</a></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li class="ms-3"><a href="{{ route('site.contact') }}">LIÊN HỆ</a></li>
            <li class="ms-3"><a href="{{ route('site.news') }}">TIN TỨC</a></li>

        </ul>
    </div>

</div>