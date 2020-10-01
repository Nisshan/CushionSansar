<div>
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($trendings as $trending)
                    <x-card.trending-product :trending="$trending"/>
                @endforeach
            </div>
        </div>
    </section>
</div>
