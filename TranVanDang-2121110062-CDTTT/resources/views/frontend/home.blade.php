@extends('layout.site')
@section('title', 'TRANG CHỦ')
@section('content')
    <x-slider-show />
    <section>
        <div class="container">

            @if(isset($list_category[1]))
            <x-product-home :cat="$list_category[1]" />
            @endif
        </div>
        <div class="container">
            <div class="QC row">

                <div class="col-lg-4 ">
                    <a href="#">
                        <img src="images/ant_index_banner_big_1.webp" alt="QC" class="w-100">
                    </a>
                </div>
                <div class="col-lg-4 align-items-center">
                    <a href="#">
                        <img src="images/ant_index_banner_small_1.webp" alt="l" class="w-100 ">
                        <img src="images/ant_index_banner_small_2.webp" alt="l" class="w-100"
                            style="margin-top: 24px;">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href>
                        <img src="images/ant_index_banner_big_2.webp" alt="s" class="w-100">
                    </a>
                </div>

            </div>

            {{-- <div class="mt-3 mb-2">
                <a style="color:rgb(21, 85, 147); " href="#">
                    <h5> BÁN CHẠY NHẤT</h5>
                </a>
            </div>
            <div class="m-2" style="border: 1px solid; opacity: 0.2;"></div>
            <div class="row">
                <div class="product-big-item col-lg-3">
                    <a href="#">
                        <div class="product-big-name">
                            <h4 class="text-center mt-2 text-black">Vali Rovigo
                                Revo BD_24 M Light Blue</h4>
                        </div>
                        <div class="product-big-price text-center">
                            <strong style="color:rgb(21, 85, 147) ;">1.200.000đ</strong>
                            <span class="text-decoration-line-through p-2 text-black">3.740.000đ</span>

                        </div>
                        <div class="product-big-img">
                            <a href="#">
                                <img src="images/rovigo-revo-bd-24-m-light-blue-1024.webp" alt>
                            </a>
                        </div>
                        <div class="promos">
                            <ul>
                                <li>
                                    <strong>Bảo hành</strong>
                                    10 năm
                                </li>
                                <li>
                                    <strong>Kích thước</strong>
                                    62.5 x 43.5 x 26.5 cm
                                </li>
                                <li>
                                    <strong>Trọng lượng</strong>
                                    3,3 Kg
                                </li>
                                <li>
                                    <strong>Thể tích</strong>
                                    65 Kg
                                </li>
                            </ul>
                        </div>
                        <div class="cart-big">
                            <button class="cart-big-btn">THÊM VÀO GIỎ HÀNG</button>
                        </div>

                    </a>

                </div>
                <div class="col-lg-9">
                    <div class="row product-row row-cols-2 row-cols-lg-4 g-4">
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM
                                            VÀO GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
            @if(isset($list_category[2]))
            <x-product-home :cat="$list_category[2]" />
            @endif
        </div>
        <div class="bg-pd mt-5" style="background-image: url('images/ant_product_title_2.webp');">
            <div class="container">
                <div class=" ">
                    <a class="text-light " href="#">
                        <h5 class="mt-5"> SẢN PHẨM NỔI BẬT</h5>
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ant-bag">
                            <a href="#">
                                <img src="images/ant-image-product-home.webp" alt class="w-100" style="height: 400px;">
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="product-bg-image d-flex" style="background-color: white;">
                                    <a href="#" style="width: 111px;">
                                        <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt
                                            style="width: 100px;" class="mb-2">
                                    </a>
                                    <a href="#">
                                        <h6>Túi Xách Cartinoe MIVIDA088 Starry
                                            12</h6>
                                        <strong>440.000đ</strong>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="mt-3 mb-2">
                <a style="color:rgb(21, 85, 147); " href="#">
                    <h5> VALI</h5>
                </a>
            </div>
            <div class="m-2" style="border: 1px solid; opacity: 0.2;"></div>
            <div class="product">
                <div class="row product-row row-cols-2 row-cols-lg-6 g-6 ">
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-items over">
                            <div class="product-image">
                                <a href="#">
                                    <img src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt="sp1">
                                </a>
                            </div>
                            <div class="product-name">
                                <a href="#">
                                    <h6>Túi Xách Cartinoe MIVIDA088 Starry 12</h6>
                                </a>
                            </div>
                            <div class="price-cart">
                                <a href="#" class="link_cart" style="color: #155593; font-size: 15px;"><strong>THÊM
                                        VÀO
                                        GIỎ HÀNG</strong> </a>
                                <span class="price" style="color: #155593; font-weight: 500; ">
                                    1.200.000đ </span><s class="price" style="margin-left: 15px;">200.000đ</s>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="#">
                        <img src="images/ant_index_bottom_banner_big_1.webp" alt class="w-100">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <img src="images/ant_index_bottom_banner_big_2.webp" alt class="w-100">
                    </a>
                </div>
            </div>
            <div class="mt-4 mb-3">
                <a class="text-black" href="#">
                    <h5> TIN TỨC SẢN PHẨM</h5>
                </a>
            </div>
            <div class="row">
                <div class="col-md-3 news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/8-buoc-xep-do-trong-vali-2.webp" alt class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Điểm danh 6 mẹo giúp bạn xếp đồ gọn gàng trong
                                vali</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5 ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-3 news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/sakos-sapphire-z261.webp" alt class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Lợi ích của chiếc ổ khóa như thế nào?</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5  ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-3 news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/hanh-li-xach-ho-len-may-bay-se-khien-ban-o-tu.webp" alt class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Lưu ý đặc biệt khi chuẩn bị hành lý khi đi máy
                                bay!</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5 ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-3 news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/vali-keo-vai-du-gia-re-du-lich-1.webp" alt class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Mùa Valentine trắng thì không thể thiếu
                                "Kakashi Hema"</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5 ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </section>
@endsection
