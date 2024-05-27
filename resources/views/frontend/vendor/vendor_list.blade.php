@extends('frontend.frontend_master')

@section('content')

@section('title')
    Vendor List
@endsection

<main class="main pages mb-80">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{route('frontend.index')}}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Vendors List
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Vendors List</h1>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                        </div>

                    </div>
                </div>
            </div>

            @php
                $vendors = App\Models\User::where('status', 'active')
                    ->where('role', 'vendor')
                    ->orderBy('id', 'DESC')
                    // ->limit(4)
                    ->get();
            @endphp

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
                <!--end vendor card-->
            </div>
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

@endsection
