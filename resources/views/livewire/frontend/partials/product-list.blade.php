<section class="single_product_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach($products as $product)
                    <x-card.product :product="$product"/>
                @endforeach
            </div>
        </div>
    </div>
</section>
