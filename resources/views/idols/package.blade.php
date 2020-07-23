@extends('idols.template')
@section('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Voting packages</h1>
      <p class="lead text-muted">Welcome to package buying section. you can select what idols you like by buying the following packages each with unique points for your voting process.</p>
      <p>
        <a href="{{route('about')}}" class="btn btn-primary my-2">Contact Us</a>
        <a href="{{route('about')}}" class="btn btn-secondary my-2">See Terms and Conditions</a>
      </p>
    </div>
  </section>

  <div class="album py-5" background="{{asset('img/bg2.jpg')}}">
    <div class="container">

      <div class="row">

 @foreach($packages as $pack) 
 
            <div class="col-md-4">
              <form  class="shadow p-3" method="post" action="{{route('vote')}}" enctype="multipart/form-data"> 
              @csrf
              <div class="card mb-4 box-shadow">
              <div class="products"><img class="card-img-top" class="images"  src="{{asset($pack->photo)}}" width="250px" height="300px" alt="Card image cap">
                {{--<!-- <div class="middle"><div class="text">
                <a href="orderform.html">
                  <button type="submit" class="btn btn-info">Buy</button>
                </a>
                </div></div> -->--}}
                </div>

                <input type="hidden" name="package_id" value="{{$pack->id}}">
                <input type="hidden" name="point" value="{{$pack->point}}">
                <input type="hidden" name="candidate_id" value="{{$cid}}">

                <div class="card-body">
                  <p style="font-size: 20px">
                    <b>Name : </b> <span class="text-dark">{{$pack->name}}</span> 
                  </p>
                  <p style="font-size: 20px">
                    <b>Amount : </b> <span class="text-dark">{{$pack->amount}}</span> 
                  </p>
                  <p style="font-size: 20px" name="point">
                    <b>Point : </b> <span class="text-dark">{{$pack->point}}</span> 
                  </p>

              </div>
              <div class="card-footer">
              <center>
                <button type="submit" class="btn btn-outline-info">Buy</button>
              </center>
              </div>
            </div>
          </form>
            </div>

@endforeach

      </div>
  </div>
</div>

</main>

  @endsection