@props(['trending'])
<div class="col-lg-4 col-sm-6">
    <div class="single_product_item">
        <div class="single_product_item_thumb">
            <img src="{{asset($trending->imagePath())}}" alt="{{$trending->name}}"
                 class="img-fluid">
        </div>
        <h3><a href="single-product.html">{{$trending->name}}</a></h3>
        <p>{{$trending->price}}</p>
    </div>
</div>
