@php
$banner=App\Models\Banner::orderBy('banner_title','ASC')->get();
@endphp

<section class="banners mb-25">
    <div class="container">
        <div class="row">
            @foreach ($banner as $banners)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ url('upload/banner/',$banners->banner_image) }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            {{ $banners->banner_title }}
                        </h4>
                        <a class='btn btn-xs' href='{{ $banners->banner_url }}'>Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
