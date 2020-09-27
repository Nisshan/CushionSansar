<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Product Details
            </h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Name</dt>
                <dd class="col-sm-8">{{$product->name}}</dd>
                <dt class="col-sm-4">Description</dt>
                <dd class="col-sm-8">{!! $product->description !!}</dd>
                <dt class="col-sm-4 ">Price</dt>
                <dd class="col-sm-8">{{ $product->price }}</dd>
                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">{{ $product->status == 1 ? 'active' : 'disabled' }}</dd>
                <dt class="col-sm-4">Is Hero</dt>
                <dd class="col-sm-8">{{ $product->is_hero == 1 ? 'yes' : 'No' }}</dd>
                <dt class="col-sm-4">Is Popular</dt>
                <dd class="col-sm-8">{{ $product->is_popular == 1 ? 'yes' : 'No' }}</dd>
                <dt class="col-sm-4">Views</dt>
                <dd class="col-sm-8">{{ $product->views }}</dd>
                <dt class="col-sm-4">Image</dt>
                <dd class="col-sm-8">
                    @if(!empty($product->image)) <img
                        src="{{ url('/storage/products/'.$product->image) }}" class="img-thumbnail"
                        width="100px" height="100px">
                    @endif
                </dd>

                <dt class="col-sm-4">Images</dt>
                <dd class="col-sm-8">
                    @if(!empty($product->images))
                        @foreach($product->images as $image)
                            <img src="{{ url('/storage/products/'.$image->url) }}" class="img-thumbnail"
                                 width="100px" height="100px">
                        @endforeach
                    @endif
                </dd>
                <dt class="col-sm-4">Categories</dt>
                <dd class="col-sm-8">
                    @foreach($product->categories as $category)
                        @if(!$loop->last)
                            <span class="tag">{{$category->name}}</span> {{','}}
                        @else
                            {{$category->name}}
                        @endif
                    @endforeach
                </dd>
            </dl>
            <livewire:product.delete :product="$product"/>
        </div>

    </div>
</div>
