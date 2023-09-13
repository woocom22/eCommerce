    <section class="hero">
        <div class="container">
            <div class="row">
                @include('frontend.inc.heroCategory')
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                          </div>
                    </div>
                    {{-- Slider area start  --}}



                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($sliders as $key => $slider)
                          <div class="carousel-item {{$key == 0 ? 'active':''}} ">
                            @if ($slider->image)
                            <div class="hero__item set-bg" data-setbg="{{ asset($slider->image) }}">
                                @endif
                                <div class="hero__text">
                                    <span>FRUIT FRESH</span>
                                    <h2>{{ $slider->title }}</h2>
                                    <p>{{ $slider->description }}</p>
                                    <a href="#" class="primary-btn">SHOP NOW</a>
                                </div>
                            </div>
                          </div>
                          @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    {{-- Slider area end  --}}


                </div>
            </div>
        </div>
    </section>
