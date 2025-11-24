@extends('layouts.frontend')

@section('content')
<main>
    <!-- Post Details Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <!-- Post Content -->
                <div class="col-lg-8">
                    <div class="about-right mb-90">
                        <!-- Post Image -->
                        <div class="about-img mb-4">
                            <img src="{{ asset( $post->image) }}" alt="{{ $post->title }}">
                        </div>
                        <!-- Post Title -->
                        <div class="heading-news mb-30 pt-30">
                            <h3>{{ $post->title }}</h3>
                        </div>
                        <!-- Post Content -->
                        <div class="about-prea">
                            {!! $post->content !!}
                        </div>
                        <div class="about-prea">
                            {!! $post->created_at !!}
                        </div>
                        
                    </div>

                    <!-- Contact Form (Optional) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-contact contact_form mb-80" action="" method="POST" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn boxed-btn2">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Social Follow -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            @foreach(['fb'=>'Facebook','tw'=>'Twitter','ins'=>'Instagram','yo'=>'YouTube'] as $key => $platform)
                            <div class="follow-us d-flex align-items-center mb-2">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('assets/img/news/icon-'.$key.'.png') }}" alt="{{ $platform }}"></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- News Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="{{ asset('assets/img/news/news_card.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Details End -->
</main>
@endsection
