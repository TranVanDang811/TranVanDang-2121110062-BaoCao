@if(count($list_product))
    <div class="advertisement">
        <div class="mt-3 mb-2" style="font-weight: 20px bold; font-size: 25px; ">
            <a href="{{ route('site.product_category', ['slug' =>$category->slug]) }}">{{ $category->name}}</a>
        </div>
        <div class="m-2" style="border: 1px solid; opacity: 0.2;"></div>
        <div class="flash-sale ">
            <a href="#"><img src="images/flash_sale_banner.webp" alt="flash-sale"></a>
        </div>
    </div>
    <div class="product">
        <div class="row product-row row-cols-2 row-cols-lg-6 g-6 ">
            @foreach ($list_product as $productitem )
            <x-product-item :productitem="$productitem"/>
        @endforeach

        </div>

    </div>
</div>
@endif
