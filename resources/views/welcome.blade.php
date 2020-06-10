@extends('layouts.app')

@section('content')
<div class="container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div id="colorlib-page">
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
                        <nav id="colorlib-main-menu" role="navigation">
                            <ul>
                                <li class="colorlib-active"><a href="{{ url('/') }}">Home</a></li>
                            </ul>
                        </nav>

                       
                    </aside> <!-- END COLORLIB-ASIDE -->
                    <div id="colorlib-main">
                        <section class="ftco-section ftco-no-pt ftco-no-pb">
                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-xl-12 py-5 px-md-5">
                                        <div class="row pt-md-4">
                                        @foreach ($posts as $post)
                                            <div class="col-md-12">
                                                <div class="blog-entry ftco-animate d-md-flex">
                                                    <div class="text text-2 pl-md-4">
                                                        <h3 class="mb-2"><a href="{{ url('post/'.$post->id) }}">{{ $post->title }}</a></h3>
                                                        <div class="meta-wrap">
                                                        <p class="meta">
                                                            <span><i class="icon-calendar mr-2"></i>{{ $post->publication_date }}</span>
                                                        </p>
                                                        </div>
                                                        <p class="mb-4">{{ Str::limit($post->description, 150, '...') }}</p>
                                                        <p><a href="{{ url('post/'.$post->id) }}" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        <!-- END-->
                                    </div>
                                    <!-- END COL -->
                                </div>
                            </div>
                        </section>
                    </div><!-- END COLORLIB-MAIN -->
                </div><!-- END COLORLIB-PAGE -->

                <!-- loader -->
                <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
            </div>
        </div>
</div>
@endsection
