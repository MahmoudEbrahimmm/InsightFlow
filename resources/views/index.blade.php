@extends('layouts.frontend')
@section('content')
    <main>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        <h4>{{ __('messages.all-categories') }}</h4>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-9">
                                    <div class="properties__button">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @foreach ($categories as $index => $category)
                                                    <a class="nav-item nav-link @if ($index == 0) active @endif"
                                                        id="nav-{{ $category->id }}-tab" data-bs-toggle="tab"
                                                        href="#nav-{{ $category->id }}" role="tab"
                                                        aria-controls="nav-{{ $category->id }}"
                                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                                        {{ $category->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content" id="nav-tabContent">
                                        @foreach ($categories as $index => $category)
                                            <div class="tab-pane fade @if ($index == 0) show active @endif"
                                                id="nav-{{ $category->id }}" role="tabpanel"
                                                aria-labelledby="nav-{{ $category->id }}-tab">

                                                <div class="row">
                                                    @foreach ($postsByCategory[$category->id] as $post)
                                                        <div class="col-xl-6 col-lg-12 mb-40">
                                                            <div class="whats-news-single">
                                                                <div class="whates-img">
                                                                    <img src="{{ asset($post->image) }}" alt=""
                                                                        class="img-fluid w-100">
                                                                </div>
                                                                <div class="whates-caption">
                                                                    <h4>
                                                                        <a href="{{ route('posts.show',$post->id) }}">
                                                                            {{ $post->title }}
                                                                        </a>
                                                                    </h4>
                                                                    <span>by {{ $post->user->name ?? 'Unknown' }} -
                                                                        {{ $post->created_at->format('M d, Y') }}
                                                                    </span>
                                                                    <p>{{ $post->smallDescription }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Banner -->
                        <div class="banner-one mt-20 mb-30">
                            <img src="{{ asset('frontend/assets/img/gallery/body_card1.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="slider-active">
                                    @foreach ($latestPost as $post)
                                        <div class="single-slider">
                                            <div class="trending-top mb-30">
                                                <div class="trend-top-img">
                                                    <img src="{{ asset($post->image) }}" style="width: 330px;"
                                                        alt="">
                                                    <div class="trend-top-cap">
                                                        <p class="bgr text-truncate d-inline-block"
                                                            data-animation="fadeInUp" data-delay=".1s"
                                                            data-duration="1000ms">
                                                            {{ $post->category->name }}
                                                        </p>

                                                        <h5>
                                                            <a href="" data-animation="fadeInUp" data-delay=".4s"
                                                                data-duration="1000ms">
                                                                {{ $post->title }}
                                                            </a>
                                                        </h5>

                                                        <p data-animation="fadeInUp" data-delay=".6s"
                                                            data-duration="1000ms">
                                                            by {{ $post->user->name ?? 'Unknown' }} -
                                                            {{ $post->created_at->format('M d, Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Most Recent Area -->
                        <div class="most-recent-area">
    <!-- Section Tittle -->
    <div class="small-tittle mb-20">
        <h4>Most Recent</h4>
    </div>

    <!-- Details -->
    @foreach ($latestPostTow as $post)
        <div class="most-recent mb-40">
            <div class="most-recent-img">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                <div class="most-recent-cap">
                    <span class="bgbeg">{{ $post->category->title ?? 'Uncategorized' }}</span>
                    <h4>
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h4>
                    <p>by {{ $post->user->name ?? 'Unknown' }} | {{ $post->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col-lg-3">
                            <div class="home-banner2 d-none d-lg-block">
                                <img src="{{ asset('frontend/assets//img/gallery/body_card2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9">
    <div class="slider-wrapper">
        <!-- section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="small-tittle mb-30">
                    <h4>{{ __('messages.all-posts') }}</h4>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="row">
            <div class="col-lg-12">
                <div class="weekly2-news-active d-flex">
                    @foreach ($posts as $post)
                        <!-- Single -->
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            </div>
                            <div class="weekly2-caption">
                                <h4>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <p>by {{ $post->user->name ?? 'Unknown' }} | {{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!--  Recent Articles start -->
        <div class="recent-articles pt-80 pb-80">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Trending News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="recent-active dot-style d-flex dot-style">
                                <!-- Single -->
                                <div class="single-recent">
                                    <div class="what-img">
                                        <img src="{{ asset('frontend/assets//img/gallery/tranding1.png') }}"
                                            alt="">
                                    </div>
                                    <div class="what-cap">
                                        <h4><a href="#">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                            </a></h4>
                                        <P>Jun 19, 2020</P>
                                        <a class="popup-video btn-icon"
                                            href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                                class="flaticon-play-button"></span></a>

                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="single-recent">
                                    <div class="what-img">
                                        <img src="{{ asset('frontend/assets//img/gallery/tranding2.png') }}"
                                            alt="">
                                    </div>
                                    <div class="what-cap">
                                        <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a>
                                        </h4>
                                        <P>Jun 19, 2020</P>
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                                class="flaticon-play-button"></span></a>
                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="single-recent">
                                    <div class="what-img">
                                        <img src="{{ asset('frontend/assets//img/gallery/tranding1.png') }}"
                                            alt="">
                                    </div>
                                    <div class="what-cap">
                                        <h4><a href="latest_news.html">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                            </a></h4>
                                        <P>Jun 19, 2020</P>
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                                class="flaticon-play-button"></span></a>
                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="single-recent">
                                    <div class="what-img">
                                        <img src="{{ asset('frontend/assets//img/gallery/tranding2.png') }}"
                                            alt="">
                                    </div>
                                    <div class="what-cap">
                                        <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a>
                                        </h4>
                                        <P>Jun 19, 2020</P>
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                                class="flaticon-play-button"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
        
        <!-- Weekly3-News start -->
<div class="weekly3-news-area pt-80 pb-130">
    <div class="container">
        <div class="weekly3-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-wrapper">
                        <!-- Slider -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="weekly3-news-active dot-style d-flex">
                                    @foreach ($categories as $category)
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset($category->image ?? 'frontend/assets/img/default-category.png') }}" alt="{{ $category->title }}">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4>
                                                    <a>
                                                        {{ $category->title }}
                                                    </a>
                                                </h4>
                                                <p>{{ $category->created_at ? $category->created_at->format('d M Y') : '' }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Weekly-News -->


        <!-- banner-last Start -->
        <div class="banner-area gray-bg pt-90 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                        <div class="banner-one">
                            <img src="{{ asset('frontend/assets//img/gallery/body_card3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-last End -->
    </main>
@endsection
