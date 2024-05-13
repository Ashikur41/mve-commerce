<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated">Hot Deals</h4>
                <div class="product-list-small animated animated">

                    @foreach ($hot_deals as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'><img
                                        src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href='shop-product-right.html'>{{ $item->product_name }}</a>
                                </h6>
                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();
                                    $avarage = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if ($avarage == 0)
                                        @elseif($avarage == 1 || $avarage < 2)
                                            <div class="product-rating" style="width: 20%"></div>
                                        @elseif($avarage == 2 || $avarage < 3)
                                            <div class="product-rating" style="width: 40%"></div>
                                        @elseif($avarage == 3 || $avarage < 4)
                                            <div class="product-rating" style="width: 60%"></div>
                                        @elseif($avarage == 4 || $avarage < 5)
                                            <div class="product-rating" style="width: 80%"></div>
                                        @elseif($avarage == 5 || $avarage < 5)
                                            <div class="product-rating" style="width: 100%"></div>
                                        @endif
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                                </div>

                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->discount_price }}</span>
                                        <span class="old-price">&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">Special Offer</h4>
                <div class="product-list-small animated animated">

                    @foreach ($special_offer as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'><img
                                        src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'>{{ $item->product_name }}</a>
                                </h6>
                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();
                                    $avarage = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if ($avarage == 0)
                                        @elseif($avarage == 1 || $avarage < 2)
                                            <div class="product-rating" style="width: 20%"></div>
                                        @elseif($avarage == 2 || $avarage < 3)
                                            <div class="product-rating" style="width: 40%"></div>
                                        @elseif($avarage == 3 || $avarage < 4)
                                            <div class="product-rating" style="width: 60%"></div>
                                        @elseif($avarage == 4 || $avarage < 5)
                                            <div class="product-rating" style="width: 80%"></div>
                                        @elseif($avarage == 5 || $avarage < 5)
                                            <div class="product-rating" style="width: 100%"></div>
                                        @endif
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ count($reviewcount) }})</span>
                                </div>

                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->discount_price }}</span>
                                        <span class="old-price">&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">

                    @foreach ($new as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'><img
                                        src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'>{{ $item->product_name }}</a>
                                </h6>
                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();
                                    $avarage = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if ($avarage == 0)
                                        @elseif($avarage == 1 || $avarage < 2)
                                            <div class="product-rating" style="width: 20%"></div>
                                        @elseif($avarage == 2 || $avarage < 3)
                                            <div class="product-rating" style="width: 40%"></div>
                                        @elseif($avarage == 3 || $avarage < 4)
                                            <div class="product-rating" style="width: 60%"></div>
                                        @elseif($avarage == 4 || $avarage < 5)
                                            <div class="product-rating" style="width: 80%"></div>
                                        @elseif($avarage == 5 || $avarage < 5)
                                            <div class="product-rating" style="width: 100%"></div>
                                        @endif
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ count($reviewcount) }})</span>
                                </div>

                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->discount_price }}</span>
                                        <span class="old-price">&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated">Special Deals</h4>
                <div class="product-list-small animated animated">

                    @foreach ($special_deals as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'><img
                                        src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href='{{ url('product/details/' . $item->id . '/' . $item->product_slug) }}'>{{ $item->product_name }}</a>
                                </h6>
                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();
                                    $avarage = App\Models\Review::where('product_id', $item->id)
                                        ->where('status', 1)
                                        ->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if ($avarage == 0)
                                        @elseif($avarage == 1 || $avarage < 2)
                                            <div class="product-rating" style="width: 20%"></div>
                                        @elseif($avarage == 2 || $avarage < 3)
                                            <div class="product-rating" style="width: 40%"></div>
                                        @elseif($avarage == 3 || $avarage < 4)
                                            <div class="product-rating" style="width: 60%"></div>
                                        @elseif($avarage == 4 || $avarage < 5)
                                            <div class="product-rating" style="width: 80%"></div>
                                        @elseif($avarage == 5 || $avarage < 5)
                                            <div class="product-rating" style="width: 100%"></div>
                                        @endif
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ count($reviewcount) }})</span>
                                </div>

                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>&#2547;{{ $item->discount_price }}</span>
                                        <span class="old-price">&#2547;{{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@php
    $vendors = App\Models\User::where('status', 'active')
        ->where('role', 'vendor')
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
@endphp

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__ animate__fadeIn animated"
            style="visibility: visible; animation-name: fadeIn;">
            <h3>Vendor List</h3>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row vendor-grid">

                    @foreach ($vendors as $vendor)
                        <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                            <div class="vendor-wrap mb-40">
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="vendor-details-1.html">
                                            <img class="default-img"
                                                src="{{ !empty($vendor->photo) ? url('upload/vendor_image/' . $vendor->photo) : url('upload/no_image.jpg') }}"
                                                alt="" style="width: 120px; height:120px;">
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Mall</span>
                                    </div>
                                </div>
                                <div class="vendor-content-wrap">
                                    <div class="d-flex justify-content-between align-items-end mb-30">
                                        <div>
                                            <div class="product-category">
                                                <span class="text-muted">Since {{ $vendor->vendor_join }}</span>
                                            </div>
                                            <h4 class="mb-5"><a
                                                    href="{{ route('vendor.details', $vendor->id) }}">{{ $vendor->name }}</a>
                                            </h4>
                                            @php
                                                $reviewcount = App\Models\Review::where('product_id', $vendor->id)
                                                    ->where('status', 1)
                                                    ->latest()
                                                    ->get();
                                                $avarage = App\Models\Review::where('product_id', $vendor->id)
                                                    ->where('status', 1)
                                                    ->avg('rating');
                                            @endphp
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    @if ($avarage == 0)
                                                    @elseif($avarage == 1 || $avarage < 2)
                                                        <div class="product-rating" style="width: 20%"></div>
                                                    @elseif($avarage == 2 || $avarage < 3)
                                                        <div class="product-rating" style="width: 40%"></div>
                                                    @elseif($avarage == 3 || $avarage < 4)
                                                        <div class="product-rating" style="width: 60%"></div>
                                                    @elseif($avarage == 4 || $avarage < 5)
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    @elseif($avarage == 5 || $avarage < 5)
                                                        <div class="product-rating" style="width: 100%"></div>
                                                    @endif
                                                </div>
                                                <span class="font-small ml-5 text-muted">
                                                    ({{ count($reviewcount) }})
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            @php
                                                $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                                            @endphp
                                            <span class="font-small total-product">{{ count($products) }}
                                                products</span>
                                        </div>
                                    </div>
                                    <div class="vendor-info mb-30">
                                        <ul class="contact-infor text-muted">
                                            <li><img src="{{ asset('Frontend/assets/imgs/theme/icons/icon-location.svg') }}"
                                                    alt=""><strong>Address: </strong>
                                                <span>{{ $vendor->address }}</span>
                                            </li>
                                            <li><img src="{{ asset('Frontend/assets/imgs/theme/icons/icon-contact.svg') }}"
                                                    alt=""><strong>Call
                                                    Us:</strong><span>{{ $vendor->phone }}</span></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-xs" href="{{ route('vendor.details', $vendor->id) }}">Visit
                                        Store <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end vendor card-->
                    @endforeach

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
    </div>
</section>
