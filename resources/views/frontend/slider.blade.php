<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
  </ol>
  <div class="carousel-inner">
      @foreach($sliders as $key => $slider)
      <div class="carousel-item {{$key == 0 ? 'active' : '' }} " style="height:650px;">
          <img src="{{url('Slider', $slider->image)}}" class="d-block w-100"  alt="..."> 
      </div>
      @endforeach
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>