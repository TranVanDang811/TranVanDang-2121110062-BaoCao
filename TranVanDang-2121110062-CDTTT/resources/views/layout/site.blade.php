<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css') }}"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css') }}"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css') }}"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 header-tips">
                        <div class="autoplay">
                            <div class="items" style="width: 565px;">
                                <a href="#">Lưu ý đặc biệt khi chuẩn bị hành
                                    lý khi đi máy bay!</a>
                            </div>
                            <div class="items" style="width: 565px;">
                                <a href="#">Điểm danh 6 mẹo giúp bạn xếp đồ
                                    gọn gàng trong vali</a>
                            </div>
                            <div class="items" style="width: 565px;">
                                <a href="#">Lợi ích của chiếc ổ khóa như thế
                                    nào?</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 header-accoutn  ">
                        <ul>
                            <li><a href="#">Đăng Nhập</a></li>
                            <li><a href="#">Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        </div>

        <div class="container">
            <div class="row pt-2">
                <div class="col-lg-2 col-md-2 col-xs-4">
                    <a href="{{ route('site.index') }}">
                        <img class="mt-3" src="{{ asset('images/logo.webp') }}" alt="logo" width="177px">
                    </a>
                </div>
                <div class="col-lg-6 col-md-5 col-xs-8 fix-header">
                    <form class="d-flex " role="search">
                        <input class="search " type="search" placeholder="Tiềm kiếm images phẩm..." aria-label="Search">
                        <button class="btnn" type="submit" style="width: 56px; border-width: 0px;"><i
                                class="fa-solid fa-magnifying-glass text-light"></i></button>
                    </form>
                </div>
                <div class="col-md-5 col-lg-4 d-flex " style="
                margin-top: -6px;">
                    <div class="text-center " style="margin-left: 10px;">
                        <span style="font-size: 13px;">HOTLINE ĐẶT HÀNG</span><br><a href="tel:19006750"
                            class="text-danger"><span style="font-size: 20px; font-weight: 500;">1900
                                6750</span></a>
                    </div>
                    <div class="text-center " style="margin-left: 27px;">
                        <span style="font-size: 13px;">XEM HỆ THỐNG </span><br>
                        <a href="/cua-hang" title="19 Siêu Thị" class="text-danger"><span
                                style="font-size: 20px; font-weight: 500;">19
                                Siêu Thị</span> </a>
                    </div>
                    <div class="cart ">
                        <a href="{{ route('site.cart') }}" class="text-black">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div class="basket-item-count count_item_pr">0</div>
                        </a>
                        <div class="top-cart-content">
                            <ul class="cart-sidebar">
                                <ul class="list-item-cart">

                                    <li class="item ">
                                        <a class="product-cart-img" href>
                                            <img style="width: 80px;"
                                                src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt>
                                        </a>
                                        <div class="detail-item ">
                                            <div class="product-details">
                                                <a href="#" class="remove-item-cart fa fa-remove"></a>
                                                <p class="product-name">
                                                    <a style="font-size: 14px;" href="#">
                                                        Túi Xách Cartinoe
                                                        MIVIDA088 Starry 12
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom">
                                                <span
                                                    style="font-weight:500;font-size: 16px ; color: #155593;">200.000đ</span>
                                                <div class="quantity-select">
                                                    <div class>
                                                        <div class="quantity d-flex justify-content-start ">
                                                            <button class="minus-btn  border ">-</button>
                                                            <input type="text" class="qty-input border"
                                                                value="1">
                                                            <button class="plus-btn  border ">+</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        const minusBtn = document.querySelector(".minus-btn");
                                                        const plusBtn = document.querySelector(".plus-btn");
                                                        const inputField = document.querySelector(".qty-input");

                                                        minusBtn.addEventListener("click", function() {
                                                            const currentValue = parseInt(inputField.value);
                                                            if (currentValue > 1) {
                                                                inputField.value = currentValue - 1;
                                                            }
                                                        });

                                                        plusBtn.addEventListener("click", function() {
                                                            const currentValue = parseInt(inputField.value);
                                                            inputField.value = currentValue + 1;
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <div style="    border: 1px solid #e5e5e5;"></div>
                                    <li class="item ">
                                        <a class="product-cart-img" href>
                                            <img style="width: 80px;"
                                                src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt>
                                        </a>
                                        <div class="detail-item ">
                                            <div class="product-details">
                                                <a href="#" class="remove-item-cart fa fa-remove"></a>
                                                <p class="product-name">
                                                    <a style="font-size: 14px;" href="#">
                                                        Túi Xách Cartinoe
                                                        MIVIDA088 Starry 12
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom">
                                                <span
                                                    style="font-weight:500;font-size: 16px ; color: #155593;">200.000đ</span>
                                                <div class="quantity-select">
                                                    <div class>
                                                        <div class="quantity d-flex justify-content-start ">
                                                            <button class="minus-btn  border ">-</button>
                                                            <input type="text" class="qty-input border"
                                                                value="1">
                                                            <button class="plus-btn  border ">+</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <div style="    border: 1px solid #e5e5e5;"></div>
                                    <li class="item ">
                                        <a class="product-cart-img" href>
                                            <img style="width: 80px;"
                                                src="images/cartinoe-mivida088-starry-12-s-blue-1024.webp" alt>
                                        </a>
                                        <div class="detail-item ">
                                            <div class="product-details">
                                                <a href="#" class="remove-item-cart fa fa-remove"></a>
                                                <p class="product-name">
                                                    <a style="font-size: 14px;" href="#">
                                                        Túi Xách Cartinoe
                                                        MIVIDA088 Starry 12
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom">
                                                <span
                                                    style="font-weight:500;font-size: 16px ; color: #155593;">200.000đ</span>
                                                <div class="quantity-select">
                                                    <div class>
                                                        <div class="quantity d-flex justify-content-start ">
                                                            <button class="minus-btn  border ">-</button>
                                                            <input type="text" class="qty-input border"
                                                                value="1">
                                                            <button class="plus-btn  border ">+</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <div>
                                    <div class="top-subtotal ">
                                        <span class="sum">Tổng cộng:</span>
                                        <span class="price">600.00đ</span>
                                    </div>

                                </div>
                                <div>
                                    <div class="actions ">
                                        <a class="btn btn-gray btn-checkout" href="#">
                                            <span>THANH TOÁN</span>
                                        </a>
                                        <a class="view-cart btn btn-white margin-left-5" href="#">
                                            <span>GIỎ HÀNG</span>
                                        </a>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="m-2" style="border: 1px dotted; opacity: 0.2;"></div>
    <x-main-menu />

    @yield('content')

    <footer class="footer mt-3">
        <div class="container">
            <div class="row text-light">
                <div class="col-md-2 mt-4 footer-widget ">
                    <h6>THÔNG TIN CÔNG TY</h6>
                    <ul class="list-unstyled ">
                        <li><a class="text-light" href>Trang Chủ</a></li>
                        <li><a class="text-light" href>Giới thiệu</a></li>
                        <li><a class="text-light" href>images Phẩm</a></li>
                        <li><a class="text-light" href>Tin Tức</a></li>
                        <li><a class="text-light" href>Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mt-4">
                    <h6>CHÍNH SÁCH</h6>
                    <ul class="list-unstyled ">
                        <li><a class="text-light" href>Trang Chủ</a></li>
                        <li><a class="text-light" href>Giới thiệu</a></li>
                        <li><a class="text-light" href>images Phẩm</a></li>
                        <li><a class="text-light" href>Tin Tức</a></li>
                        <li><a class="text-light" href>Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mt-4">
                    <h6>THÔNG TIN LIÊN HỆ</h6>
                    <ul class="list-unstyled ">
                        <li><a class="text-light" href><i class="fa-solid fa-location-dot"></i> 70 Lu
                                Gia, Ward
                                15, District 11, Ho Chi Minh City</a></li>
                        <li><a class="text-light" href><i class="fa-solid fa-phone"></i> 0821751214</a></li>
                        <li><a class="text-light" href><i class="fa-solid fa-envelope"></i>
                                Support@gmail.com</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-5 mt-4">
                    <h6>ĐĂNG KÝ NHẬN TIN</h6>
                    <ul class="list-unstyled ">
                        <li><a class="text-light" href>Nhận thông tin images phẩm
                                mới nhất, tin khuyến mãi và nhiều
                                hơn nữa.</a></li>
                        <li>
                            <form class="d-flex " role="email">
                                <input class="Register " type="email" placeholder="email" aria-label="email">
                                <button class="btnnR text-light" type="submit">Đăng
                                    ký</button>
                            </form>
                        </li>
                        <li>
                            <div class="Paymethods">
                                <img src="images/payment_1.svg" alt>
                                <img src="images/payment_2.svg" alt>
                                <img src="images/payment_3.svg" alt>
                                <img src="images/payment_4.svg" alt>
                                <img src="images/payment_5.svg" alt>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div style="border: 1px solid slategray; opacity: 0.2;"></div>
        <div class="text-light text-center">© Bản quyền thuộc về Trần Văn Đẳng |
            Cung cấp bởi Đẳng Cấp</div>
    
    </footer>
    <div class="fixed">
        <i class="fa-solid fa-phone"></i>
    </div>
    <div style="bottom:90px; background-color: blue;" class="fixed ">
        <i class="fa-brands fa-facebook"></i>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
        integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
        integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.autoplay').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
        });
        // $('.autoplay').slick({
        //     dots: true,
        //     infinite: true,
        //     speed: 500,
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        // });
    </script>
</body>

</html>
