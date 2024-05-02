@php
$featured=App\Models\Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
$categories=App\Models\Category::orderBy('category_name','ASC')->get();
@endphp


<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class="">Featured Products</h3>
            <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                </li> --}}
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a class='btn btn-xs' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                @foreach ($featured as $product)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}'>
                                                <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="featured product" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>

                                        @php
                                        $amount= $product->selling_price - $product->discount_price;
                                        if($amount > 0)
                                        $discount= ($amount/$product->selling_price) * 100;
                                        @endphp

                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($product->discount_price == Null)
                                            <span class="new">New</span>
                                            @else
                                            <span class="hot">{{ round($discount) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>{{ $product['category']['category_name'] }}</a>
                                        </div>
                                        <h2><a href='{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}'>{{ $product->product_name }}</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>

                                        @if ($product->discount_price == Null)
                                        <div class="product-price mt-10">
                                            <span>&#2547;{{ $product->selling_price }}</span>
                                        </div>
                                        @else
                                        <div class="product-price mt-10">
                                            <span>&#2547;{{ $product->discount_price }}</span>
                                            <span class="old-price">&#2547;{{ $product->selling_price }}</span>
                                        </div>
                                        @endif
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a class='btn w-100 hover-up' href='{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->
                    <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-10-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-10-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Save 15%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Canada Dry Ginger Ale – 2 L Bottle</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-15-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-15-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">Save 35%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Encore Seafoods Stuffed Alaskan</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-12-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-12-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="sale">Sale</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Gorton’s Beer Battered Fish </a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-13-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-13-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="best">Best sale</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Haagen-Dazs Caramel Cone Ice</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-14-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-14-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Save 15%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Italian-Style Chicken Meatball</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-7-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-7-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Save 15%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Perdue Simply Smart Organics Gluten Free</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-8-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-8-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">Save 35%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Seeds of Change Organic Quinoa</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-9-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-9-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="sale">Sale</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Signature Wood-Fired Mushroom</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-13-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-13-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="best">Best sale</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Simply Lemonade with Raspberry Juice</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href='shop-product-right.html'>
                                                <img class="default-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-14-1.jpg" alt="" />
                                                <img class="hover-img" src="{{ url('Frontend') }}/assets/imgs/shop/product-14-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                            <a aria-label='Add To Wishlist' class='action-btn small hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                            <a aria-label='Compare' class='action-btn small hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Save 15%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href='shop-grid-right.html'>Hodo Foods</a>
                                        </div>
                                        <h2><a href='shop-product-right.html'>Organic Quinoa, Brown, & Red Rice</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class='btn w-100 hover-up' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>
