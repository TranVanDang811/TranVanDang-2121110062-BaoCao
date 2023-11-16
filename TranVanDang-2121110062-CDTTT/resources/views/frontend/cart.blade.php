@section('css')

@endsection
@extends('layout.site')
@section('title','GIỎ HÀNG')
@section('content')
<section>
    <div class="m-2" style="border: 1px solid #e6e6e6; opacity: .3; "></div>
    <!-- chuyển hướng trang -->
    <div class="container">
        <div class="redirectang ">
            <ul>
                <li>
                    <a href="#">Trang chủ</a>
                    <span style="margin-left: 5px; opacity: 0.5; font-size: 15px;"><i
                            class="fa-solid fa-angle-right"></i></span>
                </li>
                <li>
                    <a href="#" style="font-weight: 500;">Giỏ hàng</a>
                    <span style="margin-left: 5px; opacity: 0.5; font-size: 15px;">

                </li>

            </ul>

        </div>

    </div>
    <div class="m-2" style="border: 1px solid #e6e6e6; opacity: .7;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Giỏ hàng

                            </h4>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-9">
                            <div class="cart-tbody">
                                <div class="row shopping-cart-item">
                                    <div class="col-md-3 col-sm-3">
                                        <p class="image">
                                            <a href="#">
                                                <img src="images/rovigo-reca-1508-24-m-burgundy-1024.webp" alt=""
                                                    style="max-width: 100%;">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="box-info-product">
                                            <p class="name">
                                                <a href="#">Vali Rovigo Revo BD_24 M Light Blue</a>
                                            </p>
                                            <p class="date-tour">
                                                Khuyến mãi: Đang cập nhật
                                            </p>
                                            <p class="action" >
                                                <a href="#" style="font-size: 13px; color: #155593;">
                                                    Xóa
                                                </a>
                                            </p>
                                        </div>
                                        <div class="box-price">
                                            <p class="pricechange">
                                                200.000đ
                                            </p>

                                        </div>
                                        <!-- <div class="quantity-select">
                                            <div class="">
                                                <div class="quantity d-flex justify-content-start ">
                                                    <button class="minus-btn  border ">-</button>
                                                    <input type="text" class="qty-input border" value="1">
                                                    <button class="plus-btn  border ">+</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="m-2" style="border: 1px solid #e5e5e5; opacity: .5;"></div>
                                    <div class="col-md-3 col-sm-3">
                                        <p class="image">
                                            <a href="#">
                                                <img src="images/rovigo-reca-1508-24-m-burgundy-1024.webp" alt=""
                                                    style="max-width: 100%;">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="box-info-product">
                                            <p class="name">
                                                <a href="#">Vali Rovigo Revo BD_24 M Light Blue</a>
                                            </p>
                                            <p class="date-tour">
                                                Khuyến mãi: Đang cập nhật
                                            </p>
                                            <p class="action" >
                                                <a href="#" style="font-size: 13px; color: #155593;">
                                                    Xóa
                                                </a>
                                            </p>
                                        </div>
                                        <div class="box-price">
                                            <p class="pricechange">
                                                200.000đ
                                            </p>

                                        </div>
                                        <!-- <div class="quantity-select">
                                            <div class="">
                                                <div class="quantity d-flex justify-content-start ">
                                                    <button class="minus-btn  border ">-</button>
                                                    <input type="text" class="qty-input border" value="1">
                                                    <button class="plus-btn  border ">+</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="each-row">
                                <div class="box-style">
                                    <div class="list-info-price">
                                        <span>Tạm tính:</span>
                                        <strong>400.000đ</strong>
                                    </div>
                                </div>
                                <div class="m-2" style="border: 1px solid #e5e5e5; opacity: .5;"></div>
                                <div class="box-style">
                                    <div class="total2 ">
                                        <span class="text-label">Thành Tiền:</span>
                                        <strong class="totals_price">400.000đ</strong>
                                    </div>
                                </div>
                                <div class="btn-TT">
                                    <button class="btn-checkout">
                                        THANH TOÁN NGAY
                                    </button>
                                </div>
                                <div class="btn-TT1">
                                    <button class="btn-checkout">
                                        TIẾP TỤC MUA HÀNG
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
