<div>
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>{{$category->name}}</h1>
{{--                            <p>Seamlessly empower fully researched--}}
{{--                                growth strategies and interoperable internal</p>--}}
                            <a href="{{route('category.page',[$category->slug])}}" class="btn_1">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="{{$category->getFirstMediaUrl('category','thumb')}}" alt="#" class="img-fluid">
            <img src="{{asset('frontend/img/banner_pattern.png ')}}" alt="#" class="pattern_img img-fluid">
        </div>
    </section>
</div>

