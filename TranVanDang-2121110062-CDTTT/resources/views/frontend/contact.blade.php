@extends('layout.site')
@section('title','LIÊN HỆ')
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
                <a href="#" style="font-weight: 500;">Liên hệ</a>
            </li>
        </ul>
    </div>
    
</div>
<div class="m-2" style="border: 1px solid; color:rgb(247, 242, 242);"></div>
    <div class= "container">
        <div class= "row">
            <div class ="col-sm-4 ">
                <h5>THÔNG TIN LIÊN HỆ</h5>
              <p>Hệ Thống siêu thị bán lẻ vali, balo, túi xách, phụ kiện chính hãng hàng đầu Việt Nam: Với hơn 2000 sản phẩm, hàng trăm mẫu vali kéo, ba lô laptop, du lịch , túi thể thao...</p>
                <a style="font-size: 15px;" href><i class="fa-solid fa-location-dot"></i> 70 Lu Gia, Ward 15, District 11, Ho Chi Minh City</a><br>
                <a  style="font-size: 15px;" href><i class="fa-solid fa-phone"></i> 0821751214</a><br>
                <a  style="font-size: 15px;" href><i class="fa-solid fa-envelope"></i> Support@gmail.com</a><br>     
                
           </div>
           <div class ="col-sm-8 ">
            <h5>GỬI THÔNG TIN</h5>
            <i style="font-size: 14px;padding-bottom: 10px;">Bạn hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</i>
            <form >
         
                <div class="form-group">
                   <label for="name" style="font-size: 15px;"><strong>Họ tên</strong></label>
                   <input type="name" id = "name" class="form-control" >
                   <label for="email" style="font-size: 15px;"><strong>Email</strong></label>
                   <input type="email" id = "email" class="form-control" >
                   <label for="phone" style="font-size: 15px;"><strong>Điện thoại</strong></label>
                   <input type="phone" id = "phone" class="form-control" >
                   <label for="phone" style="font-size: 15px;"><strong>Nội dung</strong></label>
               
                   <textarea name="content" id="content" cols="111" rows="8">ss</textarea>
                  
                   
                   <button type="submit" class="btn btn-primary">GỬI TIN NHẮN</button>
                </div>
             </form>
           </div>
        </div>
        <div class="m-2" style="border: 1px dotted; opacity: 0.2;"></div>
        <div class="col-md-12">
            <div class="contact-map">
                <div class="page-login text-center">
                    <h3 class="title-head">Bản đồ cửa hàng</h3>
                </div>
                <div class="box-maps margin-top-10 margin-bottom-10">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6131.502706497998!2d106.77436973339964!3d10.827572811458051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIFRoxrDGoW5nIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1694023123014!5m2!1svi!2s" width="1270" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
     </div>
</section>
@endsection