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
                                            <h1 class="mb-3">{{ $post->title }}</h1>
                                            </div>
                                            <div class="row pt-md-4">	
                                                <span><i class="icon-calendar mr-2"></i>{{ $post->publication_date }}</span>
                                            </div>
                                            <div class="row pt-md-4">	
                                                <p>{{ $post->description }}</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-secondary" name="btn_back" href="{{ URL::previous() }}">Back</a>
                                        <!-- END-->
                                    </div>
                                    <!-- END COL -->
                                </div>
                            </div>
                        </section>
                    </div><!-- END COLORLIB-MAIN -->
                </div><!-- END COLORLIB-PAGE -->
            </div>
        </div>
</div>
@endsection
