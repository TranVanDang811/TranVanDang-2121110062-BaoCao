@extends('layout.site')
@section('title', 'Tất cả sản phẩm')
@section('content')
    <section>
        <div class="m-2" style="border: 1px solid; color:rgb(247, 242, 242);"></div>
        <!-- chuyển hướng trang -->
        <div class="container">
            <div class="redirectang ">
                <ul style="padding-left: 0px;">
                    <li>
                        <a href="#">Trang chủ</a>
                        <span style="opacity: 0.5; font-size: 15px;"><i class="fa-solid fa-angle-right"></i></span>
                    </li>
                    <li>
                        <a href="#" style="font-weight: 500;">Tất cả sản phẩm</a>

                    </li>

                </ul>

            </div>

        </div>
        <div class="m-2" style="border: 1px solid; color:rgb(247, 242, 242);"></div>
        <div class="container">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col">
                                <img src="images/cate_1.webp" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="col">
                                <img src="images/cate_2.webp" class="d-block w-100" alt="Image 2">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col">
                                <img src="images/cate_3.webp" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="col">
                                <img src="images/cate_1.webp" class="d-block w-100" alt="Image 4">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- end -->
            <div class="menu-ps d-flex">
                <a href="/vali" class="nav-link " title="Vali">Vali</a>
                <a href="/balo" class="nav-link " title="Balo">Balo</a>
                <a href="/tui-xach" class="nav-link " title="Túi xách">Túi xách</a>
                <a href="/phu-kien" class="nav-link " title="Phụ kiện">Phụ kiện</a>
            </div>
            <!-- end -->
            <h6 style="font-size: 20px;">TẤT CẢ SẢN PHẨM</h6>
            <div class="d-flex p-1 " style="background-color: rgb(248, 244, 244);align-items: center;">

                <div class="text-danger  justify-content-center ps-3">
                    <span style="margin-right: 20px; font-weight:500;">Tìm theo:</span>
                </div>
                <div type="button" class=" justify-content-center " data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Thương hiệu <i class="fa-solid fa-angle-down"
                            style="
                    font-size: 10px;"></i></span>

                </div>
                <ul class="dropdown-menu test">
                    <li><a class="dropdown-item" href="#">dd</a></li>
                    <li><a class="dropdown-item" href="#">aa</a></li>
                    <li><a class="dropdown-item" href="#">ccc</a></li>
                </ul>
                <div type="button" class=" justify-content-center ps-3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Giá sản phẩm <i class="fa-solid fa-angle-down"
                            style="
                    font-size: 10px;"></i></span>

                </div>
                <ul class="dropdown-menu test">
                    <li><a class="dropdown-item" href="#">dd</a></li>
                    <li><a class="dropdown-item" href="#">aa</a></li>
                    <li><a class="dropdown-item" href="#">ccc</a></li>
                </ul>
                <div type="button" class=" justify-content-center ps-3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Loại <i class="fa-solid fa-angle-down" style="
                    font-size: 10px;"></i></span>

                </div>
                <ul class="dropdown-menu test">
                    <li><a class="dropdown-item" href="#">dd</a></li>
                    <li><a class="dropdown-item" href="#">aa</a></li>
                    <li><a class="dropdown-item" href="#">ccc</a></li>
                </ul>
            </div>
            <div class="d-flex p-1" style="font-size: 14px;">
                <label class="form-check-label ps-1" for="flexRadioDefault1">
                    Xếp theo:
                </label>
                <div class="form-check " style="padding-left: 30px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label " for="flexRadioDefault1">
                        Tên A-Z
                    </label>
                </div>
                <div class="form-check" style="padding-left: 30px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Tên Z-A
                    </label>
                </div>
                <div class="form-check" style="padding-left: 30px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault3">
                        Hàng mới
                    </label>
                </div>
                <div class="form-check" style="padding-left: 30px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault4">
                        Giá thấp đến cao
                    </label>
                </div>
                <div class="form-check" style="padding-left: 30px;">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault5">
                        Giá cao xuống thấp
                    </label>
                </div>
            </div>
            <div class="m-2" style="border: 1px solid; color:rgb(243, 238, 238);"></div>
            <div class="product">
                <div class="row product-row row-cols-2 row-cols-lg-5 g-5 ">
                    @foreach ($list_product as $products)
                        <div class="col-md-6">
                            <div class="product-items over">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{ asset('images/product/' . $products->image) }}" alt="sp1">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="#">
                                        <h6>{{ $products->name }}</h6>
                                    </a>
                                </div>
                                <div class="price-cart">
                                    <a href="#" class="link_cart"
                                        style="color: #155593; font-size: 15px;"><strong>THÊM VÀO
                                            GIỎ HÀNG</strong> </a>
                                    <span class="price" style="color: #155593; font-weight: 500; ">
                                        {{ $products->price_retail }}đ </span><s class="price"
                                        style="margin-left: 15px;">200.000đ</s>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div>{{ $list_product->links() }}</div>
                </div>

            </div>

            <div class="ss">
                <h5 style="font-size: 18px;">4 LÝ DO NÊN CHỌN MUA HÀNG TẠI ANT BAG</h5>
                <p style="font-size: 13px;">Bắp kịp xu hướng thời trang trong nước và thế giới, việc mua sắm nhiều quần
                    áo cho tủ đồ cá nhân cần
                    phải đáp ứng tiêu chí về chất lượng tuyệt hảo mà ít tốn kém chi phí đầu tư. Phần đa bộ phận người
                    tiêu dùng chọn lựa các bộ cánh hàng hiệu để có thể một diện mạo sang trọng, phong thái tự tin nhằm
                    nâng cao hiệu quả cuộc giao tiếp, tạo nhiều cơ hội thăng tiến trong sự nghiệp. Hãy cùng Ant Bag đi
                    tìm lý do tại sao bạn nên chọn đồ chất lượng nhé!<br>
                    <strong>1. Chất lượng tuyệt hảo:</strong><br>
                    Đây là yếu tố quan trọng và ưu tiên hàng đầu khi lựa chọn bất cứ sản phẩm nào, kể cả quần áo thời
                    trang. Một bộ cánh cao cấp cần phải được làm từ nguyên liệu hảo hạng, đường may tỉ mỉ, chắc chắn cho
                    đến những họa tiết trang trí trên thành phần phải thật tinh tế, sắc sảo mới khẳng định được nét cá
                    tính riêng biệt của thương hiệu mình chọn. Khi mua quần áo nữ hàng hiệu, trang phục nam cao cấp hay
                    phụ kiện trang phục nổi bật tại Ant Bag, bạn sẽ được cam kết chất lượng bởi nguồn gốc rõ ràng, chế
                    độ bảo hành lâu dài, đổi trả cực kỳ linh hoạt.<br>
                    <strong>2. Hợp xu thế, không bị lỗi thời:</strong><br>
                    Cập nhật và bày bán liên tục các mẫu thiết kế đẹp, phong cách từ các nhãn hiệu đồ thời trang danh
                    tiếng trong nước và trên thế giới. Vẻ đẹp của mỗi bộ đồ toát lên sự giản đơn nhưng rất tinh tế và
                    cực kỳ sang trọng thể hiện được gu thẩm mỹ siêu việt của người mặc. Thêm vào đó, phụ kiện thời trang
                    mới mẻ, độc đáo không bao giờ lỗi mốt, thu hút được sự quan tâm của các tín đồ sành điệu.<br>
                    <strong>3. Khẳng định đẳng cấp, thành công:</strong><br>
                    Khoác lên mình bộ cánh hàng hiệu, chất lượng cao chính là một sự đầu tư thông thái chuẩn bị cho
                    tương lai của bạn. Với đặc thù công việc công sở thường xuyên tiếp xúc với đối tác, khách hàng hay
                    chủ trì, điều hành cuộc họp quan trọng, mua phụ kiện thời trang, bộ đồ “xịn” sẽ mang đến ấn tượng
                    tốt trong cách đánh giá của người đối diện. Từ đó, khả năng thành công sẽ được nhân lên rõ rệt, giúp
                    bạn trở nên tự tin, có phong thái của người lãnh đạo xuất chúng.<br>
                    <strong>4. Độ bền bỉ cao:</strong><br>
                    Điểm khác biệt rõ rệt nhất giữa bộ đồ hàng hiệu và đồ “fake”, kém chất lượng chính là sự đảm bảo về
                    độ bền bỉ của chúng. Không cần bàn cãi, độ bền của sản phẩm hàng cao cấp sẽ kéo dài hơn nhiều so với
                    mẫu vay mượn bởi chúng được làm ra bởi thợ may chuyên nghiệp, nguyên liệu tuyệt vời tránh được tình
                    trạng bục chỉ, dễ rách.<br>
                    Hãy truy cập trang web <a href="https://ant-bag.bizwebvietnam.net" title="Ant Bag">Ant Bag</a> tự
                    chọn cho mình mẫu trang phục đẹp, phong cách, chất lượng với giá thành phải chăng các bạn nhé!
                </p>
            </div>
        </div>
    </section>
@endsection
