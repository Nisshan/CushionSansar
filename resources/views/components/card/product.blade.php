@props(['product'])
<div class="single_product_iner">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6 col-sm-6">
            <div class="single_product_img">
                <img src="{{asset('frontend/img/single_product_1.png')}}" class="img-fluid"
                     alt="#">
                <img src="{{asset('frontend/img/product_overlay.png')}}" alt="#"
                     class="product_overlay img-fluid">
            </div>
        </div>
        <div class="col-lg-5 col-sm-6">
            <div class="single_product_content">
                <h5>{{$product->categories[0]->name}}</h5>
                <h2><a href="single-product.html">{{$product->name}}</a></h2>
                <a href="product_list.html" class="btn_3">Explore Now</a>
            </div>
        </div>
    </div>
</div>
