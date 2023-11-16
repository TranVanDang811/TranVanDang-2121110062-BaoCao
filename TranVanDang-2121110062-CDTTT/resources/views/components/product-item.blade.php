<div class="col-md-6">
    <div class="product-items over">
        <div class="product-image">
            <a href="#">
                <img src={{asset("images/product/".$product->image)}} alt="{{ $product->image }}">
            </a>
        </div>
        <div class="product-name">
            <a href="{{ $product->slug }}">
                <h6>{{ $product->name }}</h6>
            </a>
        </div>
        <div class="price-cart">
            <a href="{{ route('site.addcart',['id'=>$product->id])}}" class="link_cart" style="color: #155593; font-size: 15px;  border: none;"><strong>THÊM VÀO
                    GIỎ HÀNG</strong> </a>
            <span class="price" style="color: #155593; font-weight: 500; "> {{ $product->price_retail }}đ </span><s
                class="price" style="margin-left: 15px;">200.000đ</s>
        </div>
    </div>
</div>
