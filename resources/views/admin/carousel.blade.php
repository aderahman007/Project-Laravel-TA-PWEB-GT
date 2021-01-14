<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($carousel as $cs => $sl)
        <li data-target="#myCarousel" data-slide-to="{{$cs}}" class="{{$cs == 0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($carousel as $c => $slider)
        <div class="carousel-item {{$c == 0 ? 'active' : ''}}">
            <img width="100%" height="500px" class="first-slide cs" src="{{asset('image_upload/' . $slider->foto)}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>{{$slider->wisata}}</h1>
                    <p><?= substr($slider->descripsi, 0, 80); ?></p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Read More</a></p> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>