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

