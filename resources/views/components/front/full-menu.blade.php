<!-- Section Menu -->
<section class="section kf-menu kf-menu-tabs">
    <div class="container">

        <div class="kf-titles align-center">
            <div class="kf-subtitle element-anim-1 scroll-animate" data-animate="active">
                Choose Best of
            </div>
            <h3 class="kf-title element-anim-1 scroll-animate" data-animate="active">
                The Lawns Restaurant Menu
            </h3>
        </div>

        <div class="kf-filter kf-filter-menu element-anim-1 scroll-animate" data-animate="active">
            <a href="#" data-href=".all" class="active">All</a>
            @foreach (App\Models\MenuCategory::all() as $category)
            <a href="#" data-href=".{{ Str::slug($category->title) }}">{{ $category->title }}</a>
            @endforeach
        </div>

        <div class="kf-menu-items" style="background-image: url(images/menu_logo.png);">
            <div class="row">

                @foreach (App\Models\MenuItem::all() as $item)
                <div class="kf-menu-item-col col-xs-12 col-sm-12 col-md-12 col-lg-6 all {{ Str::slug($item->menuCategory->title ?? '') }}">
                    <div class="kf-menu-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image kf-image-hover">
                            <a href="{{ $item->image_path? asset('images/admin/menu_item_images/' . $item->image_path) :'/frontend/images/menu1.jpg' }}" class="has-popup-image"><img src="{{ $item->image_path? asset('images/admin/menu_item_images/' . $item->image_path) :'/frontend/images/menu1.jpg' }}" alt="" /></a>
                        </div>
                        <div class="desc">
                            <h5 class="name">{{ $item->title ?? '' }}</h5>
                            <div class="subname">{{ $item->description }}</div>
                            <div class="price"><x-currency/> {{ number_format($item->price) }}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
