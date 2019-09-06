
<div class="row mt-5">
    <div class="container mt-4">
        <div class="our-carousel mb-3">
            <div id="sliderExampleIndicators" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($sliders as $slider)
                        <li data-target="#sliderExampleIndicators" data-slide-to="{{$loop->index}}"
                            class="{{$loop->index == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                        <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                            <img class="d-block w-100 rounded" src="{{asset('images/sliders/'.$slider->image)}}"
                                 alt="{{$slider->title}}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$slider->title}}</h5>
                                <p class="lead text-danger font-weight-bold" style="font-size: 25px">
                                    Buy anything from our website.
                                </p>
                                <p>
                                    <a href="{{$slider->button_link}}" class="btn btn-primary my-2">Main call to action</a>
                                    <a href="https://www.gettyimages.com/photos/horror?sort=mostpopular&mediatype=photography&phrase=horror" class="btn btn-danger my-2">Secondary action</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#sliderExampleIndicators" data-slide="prev" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#sliderExampleIndicators" data-slide="next" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </div>
</div>