@extends('idols.template')
@section('content')


<div class="album py-5" background="{{asset('img/bg.jpg')}}">
  <div class="container">

    <div id="carouselExampleIndicators" class="carousel slide my-3" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="{{asset('img/v1.jpg')}}" alt="First slide" style="height: 500px; width: 100%">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="{{asset('img/v2.JPG')}}" alt="Second slide" style="height: 500px; width: 100%">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">

      @foreach($candidates as $cad)
      <div class="col-lg-4 col-md-6 mb-4 my-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="{{$cad->photo}}" width="100px" height="300px" alt="">
          </a>
          <div class="card-body">
            <center>
              <h4 class="card-title">{{$cad->name}}</h4>
              <small>{{$cad->bio}}</small>
            </center>
          </div>
          <div class="card-footer">
            @if(Auth::check())
            <center>
            <a href="{{route('candidate.packages',['cid'=>$cad->id])}}" class="btn btn-outline-primary">Vote This Person</a>
            </center>
            @else
            <center>
             <a href="{{route('login')}}" class="btn btn-outline-primary">Vote This Person</a>
            </center>
            @endif
            
          </div>
        </div>

      </div>
      @endforeach
    </div>

  </div>
</div>
@endsection