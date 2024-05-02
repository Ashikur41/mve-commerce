@extends('frontend.frontend_master')

@section('content')
    <main class="main">
        @include('frontend.home.home_slider')
        <!--End hero slider-->
        @include('frontend.home.popular_categories')
        <!--End category slider-->
        @include('frontend.home.home_banner')
        <!--End banners-->
        @include('frontend.home.home_product')
        <!--Products Tabs-->
        @include('frontend.home.daily_best_sells')
        <!--End Best Sales-->
        @include('frontend.home.category_product')
        <!--End Best Sales-->
        @include('frontend.home.deals_of_the_day')
        <!--End Deals-->
        @include('frontend.home.selling_four')
        <!--End 4 columns-->
    </main>
@endsection
