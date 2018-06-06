@extends('layouts.public_layout')

@section('content')
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <?php $no=1; ?>
          @foreach($informationstwo as $key)
          <?php
            if ($no==1) {
              $carousel="carousel-item active";
              $imgclass="first-slide";
            }
            elseif ($no==2) {
              $carousel="carousel-item";
              $imgclass="second-slide";
            }
            elseif ($no==3) {
              $carousel="carousel-item";
              $imgclass="third-slide";
            }
            else{
              $carousel="";
              $imgclass="";
            }
            $no++;
          ?>
          <div class="{{$carousel}}">
            <img class="{{$imgclass}}" src="{{$key->path_img}}" alt="Slide error!">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>{{$key->title}}</h1>
                <p>{{substr($key->description,0,150)}}... <a href="{{route('public.detailinformation', [$key->id])}}"><i>Read more</i></a> </p>
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


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        @foreach($programs->chunk(3) as $chunk)
        <div class="row">
          @foreach($chunk as $item)
          <div class="col-lg-4">
            <img class="rounded-circle img-responsive" src="{{asset($item->path_img)}}" alt="Generic placeholder image" width="140" height="140">
            <h2>{{$item->program_name}}</h2>
            <p>{{substr($item->description, 0, 100)}}</p>
            <!-- <p><a class="btn btn-secondary" href="" role="button">View details &raquo;</a></p> -->
          </div><!-- /.col-lg-4 -->
          @endforeach
        </div><!-- /.row -->
        @endforeach


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <div class="row">
          <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            <ul style="list-style-type: none;">
              <li style="padding-bottom:10px;"><i class="fas fa-home fa-lg"></i> Learning like at home</li>
              <li style="padding-bottom:10px;"><i class="fas fa-wifi fa-lg"></i> WI-FI</li>
              <li style="padding-bottom:10px;"><i class="fas fa-robot fa-lg"></i> Device already available*</li>
              <li style="padding-bottom:10px;"><i class="fas fa-motorcycle fa-lg"></i> Parking and free shuttle*</li>
            </ul>
          </div>
          <div class="col-md-5">
            <img src="{{asset('facility.png')}}" alt="Photo error" class="img-fluid" width="400px">
          </div>
        </div>


      </div><!-- /.container -->

@endsection
