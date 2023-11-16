@extends('layout.site')
@section('title','TIN TỨC')
@section('content')
<section >
    <div class="m-2" style="border: 1px solid; color:rgb(247, 242, 242);"></div>
    <div class="container">
       
        <div class="redirectang ">
            <ul style="padding-left: 0px;">
                <li>
                    <a href="#">Trang chủ</a>
                    <span style="opacity: 0.5; font-size: 15px;"><i class="fa-solid fa-angle-right"></i></span>
                </li>
                <li>
                    <a href="#" style="font-weight: 500;">Tất cả tin tức</a>
                </li>
            </ul>
        </div>
        
    </div>
    <div class="m-2" style="border: 1px solid; color:rgb(247, 242, 242);"></div>

    <div class= "container">
        <h2 >Tất cả tin tức</h2>
        <div class= "row">
           <div class ="col-sm-9 ">
                <div class="row">
                <div class="col-md-6     news-items" >
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/8-buoc-xep-do-trong-vali-2.webp"
                                alt class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Điểm danh 6 mẹo giúp bạn xếp đồ gọn gàng trong
                                vali</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5 ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                        <div class="news-items-day text-black" >
                            <p style="font-size: 14px;"> 
                                SẮP XẾP QUẦN ÁO
                                Gấp quần áo theo cách thông thường sẽ tạo ra nếp nhăn và trước mỗi lần dùng bạn phải ủi thẳng rất mất thời gian. Bên cạnh đó, gấp quần áo theo cách này còn chiếm một diện tích khá l...
                            </p>
                        </div>
                    </a>

                </div>
                <div class="col-md-6 news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/sakos-sapphire-z261.webp" alt
                                class="w-100">
                        </div>
                        <div class="news-items-name">
                            <h6>Lợi ích của chiếc ổ khóa như thế nào?</h6>
                        </div>
                        <div class="news-items-day text-black">
                            <p style="font-size: 13px; opacity: 0.5  ;">Ngày
                                đăng:4/4/2023</p>
                        </div>
                        <div class="news-items-day text-black" >
                            <p style="font-size: 14px;"> 
                                Nếu bạn muốn bảo vệ vali hoặc hành lý một cách tốt và chắc chắn nhất thì việc đầu tư thêm một chiếc ổ khóa nhỏ là một điều không thể thiếu. Tại sao lại chắc chắn như vậy?


                                Các dòng vali trên thị t...
                            </p>
                        </div>
                    </a>

                </div>
               
                </div>
           </div>
           
           <div class ="col-sm-3 ">
            <h5>Tin nổi bật</h5>
     
                <div class=" news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/8-buoc-xep-do-trong-vali-2.webp"
                                alt class="w-100">
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
                <div class=" news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img src="images/sakos-sapphire-z261.webp" alt
                                class="w-100">
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
                <div class=" news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img
                                src="images/hanh-li-xach-ho-len-may-bay-se-khien-ban-o-tu.webp"
                                alt class="w-100">
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
                <div class="news-items">
                    <a href="#">
                        <div class="news-items-img">
                            <img
                                src="images/vali-keo-vai-du-gia-re-du-lich-1.webp"
                                alt class="w-100">
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
     </div>
</section>
@endsection